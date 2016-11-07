<template>
    <div>
        <h2>Projects</h2>
        <h4>Create</h4>
        <p>Create a new peoject</p>
        <pre><kbd>POST</kbd> /api/projects</pre>
        <table class="table">
            <thead>
                <tr>
                    <th>Parameter</td>
                    <th>Type</td>
                    <th>Description</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>name</td>
                    <td><code>string</code></td>
                    <td>The project name</td>
                </tr>
                <tr>
                    <td>description</td>
                    <td><code>string</code></td>
                    <td>The project description</td>
                </tr>
                <tr>
                    <td>status</td>
                    <td><code>string</code></td>
                    <td>The project status</td>
                </tr>
                <tr>
                    <td>deadline</td>
                    <td><code>datetime</code> in format <code>(YYYY-MM-DD H:m:i)</code></td>
                    <td>The project dealine</td>
                </tr>
            </tbody>
        </table>

        <h4>Update</h4>
        <p>Update the project with the <code>id</code> value. Use the same parameters as create to update the project</p>
        <pre><kbd>PUT</kbd> /api/projects/{id}</pre>

        <h4>List</h4>
        <p>Get all the user's projects with its tasks</p>
        <pre><kbd>GET</kbd> /api/projects</pre>

        <h4>Delete</h4>
        <p>Delete the project with the <code>{id}</code> value</p>
        <pre><kbd>DELETE</kbd> /api/projects/{id}</pre>

        <h2>Tasks</h2>
        <h4>Create</h4>
        <p>Create a new task</p>
        <pre><kbd>POST</kbd> /api/tasks</pre>
        <table class="table">
            <thead>
                <tr>
                    <th>Parameter</td>
                    <th>Type</td>
                    <th>Description</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>name</td>
                    <td><code>string</code></td>
                    <td>The task name</td>
                </tr>
                <tr>
                    <td>description</td>
                    <td><code>string</code></td>
                    <td>The task description</td>
                </tr>
                <tr>
                    <td>status</td>
                    <td><code>string</code></td>
                    <td>The task status</td>
                </tr>
                <tr>
                    <td>deadline</td>
                    <td><code>datetime</code> in format <code>(YYYY-MM-DD H:m:i)</code></td>
                    <td>The task dealine</td>
                </tr>
                <tr>
                    <td>project_id</td>
                    <td><code>integer</code></td>
                    <td>The project id</td>
                </tr>
            </tbody>
        </table>

        <h4>Update</h4>
        <p>Update the task with the <code>id</code> value. Use the same parameters as create to update the task</p>
        <pre><kbd>PUT</kbd> /api/tasks/{id}</pre>

        <h4>List</h4>
        <p>Get all the user's tasks</p>
        <pre><kbd>GET</kbd> /api/tasks</pre>

        <h4>Delete</h4>
        <p>Delete the task with the <code>{id}</code> value</p>
        <pre><kbd>DELETE</kbd> /api/tasks/{id}</pre>

        <h4>Assign</h4>
        <p>Assign/re-assign a task to a user</p>
        <pre><kbd>POST</kbd> /api/tasks/assign</pre>
        <table class="table">
            <thead>
                <tr>
                    <th>Parameter</td>
                    <th>Type</td>
                    <th>Description</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>task_id</td>
                    <td><code>integer</code></td>
                    <td>The task id</td>
                </tr>
                <tr>
                    <td>user_id</td>
                    <td><code>integer</code></td>
                    <td>The user id</td>
                </tr>
                <tr>
                    <td>comment</td>
                    <td><code>string</code></td>
                    <td>Comment of the assignment</td>
                </tr>
            </tbody>
        </table>

        <h2>User</h2>
        <h4>Update profile</h4>
        <p>Update the profile of the authorized user</p>
        <pre><kbd>PUT</kbd> /api/users/update</pre>
        <table class="table">
            <thead>
                <tr>
                    <th>Parameter</td>
                    <th>Type</td>
                    <th>Description</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>name</td>
                    <td><code>string</code></td>
                    <td>the user's name</td>
                </tr>
                <tr>
                    <td>birth_date</td>
                    <td><code>date</code> in format <code>(YYYY-MM-DD)</code></td>
                    <td>The user's birth date</td>
                </tr>
                <tr>
                    <td>avatar</td>
                    <td><code>string</code></td>
                    <td>The user's avatar as URL</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
