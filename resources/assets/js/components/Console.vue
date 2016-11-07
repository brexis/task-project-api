<template>
    <form role="form">
        <p class="text-center">
            <button type="button" class="btn btn-primary" @click="login" v-if="!authorized">Authorize</button>
            <button type="button" class="btn btn-danger" @click="logout" v-if="authorized">Revoke access</button>
        </p>
        <div class="row">
            <div class="col-md-2">
                <select class="form-control" v-model="method">
                    <option value="GET">GET</option>
                    <option value="POST">POST</option>
                    <option value="PUT">PUT</option>
                    <option value="DELETE">DELETE</option>
                </select>
            </div>
            <div class="col-md-10">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter request URL" v-model="url">
                    <span class="input-group-btn">
                        <button type="button" name="button" class="btn btn-default" v-on:click="addParam">
                            <i class="glyphicon glyphicon-plus"></i> Add param
                        </button>
                        <button class="btn btn-default" type="button" v-on:click="send">Send</button>
                    </span>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Value</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(param, index) in params">
                    <td><input type="text" class="form-control" v-model="param.input"></td>
                    <td><input type="text" class="form-control" v-model="param.value"></td>
                    <td>
                        <button type="button" class="btn btn-danger" v-on:click="removeParam(index)">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Request</h3>
                    </div>
                    <div class="panel-body">
                        <pre class="json">{{ request | json }}</pre>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Response</h3>
                    </div>
                    <div class="panel-body">
                        <pre class="json">{{ response | json }}</pre>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
let OAuth = require('../auth');
let url = require('url');

export default {
    data() {
        return {
            authorized: false,
            url: 'http://localhost:8000/api/projects',
            method: 'GET',
            params: [],
            request: null,
            response: null
        };
    },
    mounted() {
        let token = OAuth.getToken();

        function appendHttpToken(token) {
            Vue.http.headers.common['Authorization'] = 'Bearer ' + token;
        }

        if (token) {
            this.authorized = true;
            appendHttpToken(token);
        } else {
            let urlObject = url.parse(window.location.href, true);
            let code = urlObject.query.code;

            if (code) {
                OAuth.requestToken(code, (token) => {
                    this.authorized = true;
                    appendHttpToken(token);
                });
            }
        }
    },
    methods: {
        showRequest() {
            this.request = {
                method: this.method,
                url: this.url,
                params: this.params
            };
        },
        showResponse(resp) {
            this.response = {
                status: resp.status,
                statusText: resp.statusText,
                body: resp.body
            };
        },
        addParam() {
            this.params.push({});
        },
        removeParam(index) {
            this.params.splice(index, 1);
        },
        parseParams(params) {
            let parsed = {};
            params.forEach(param => {
                parsed[param.input] = param.value;
            });

            return parsed;
        },
        send() {
            let http = null;
            let params = this.parseParams(this.params);
            this.request = null;
            this.response = null;

            switch(this.method) {
                case 'GET':
                http = this.$http.get(this.url, {params: params});
                break;
                case 'POST':
                http = this.$http.post(this.url, params);
                break;
                case 'PUT':
                http = this.$http.put(this.url, params);
                break;
                case 'DELETE':
                http = this.$http.delete(this.url, {params: params});
                break;
            }

            if (http) {
                this.showRequest();
                http.then(this.showResponse, this.showResponse);
            }
        },
        login() {
            OAuth.authorize();
        },
        logout() {
            this.authorized = false;
            Vue.http.headers.common['Authorization'] = null;
            OAuth.revoke();
        }
    },
    filters: {
        json(value) {
            return JSON.stringify(value, null, 2);
        }
    }
}
</script>
