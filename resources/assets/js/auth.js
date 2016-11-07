module.exports = {
    getToken() {
        return localStorage.getItem('token');
    },
    authorize() {
        window.location.href = this.getAuthorizeUrl();
    },
    revoke() {
        localStorage.removeItem('token');
    },
    requestToken(code, success) {
        Vue.http.post(window.Laravel.AUTH_TOKEN_URL, {
            grant_type: 'authorization_code',
            client_id:  window.Laravel.CLIENT_ID,
            client_secret:  window.Laravel.CLIENT_SECRET,
            redirect_uri:  window.Laravel.REDIRECT_URL,
            code: code
        }).then( res => {
            let token = res.body.access_token;
            localStorage.setItem('token', token);
            success(token);
        });
    },
    getAuthorizeUrl() {
        let params = {
            client_id: window.Laravel.CLIENT_ID,
            redirect_uri: window.Laravel.REDIRECT_URL,
            response_type: 'code',
            scope: ''
        };

        return window.Laravel.AUTH_URL + '?' + $.param(params);
    }
};
