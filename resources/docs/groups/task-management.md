# Task management

APIs for managing Tasks

## api/tasks

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "data": [
        {
            "id": 1,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:24:36.000000Z",
            "updated_at": "2021-02-17T15:24:36.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 2,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:27:09.000000Z",
            "updated_at": "2021-02-17T15:27:09.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 3,
            "title": "new task",
            "description": "demo description",
            "user_id": 56,
            "created_at": "2021-02-17T15:28:28.000000Z",
            "updated_at": "2021-02-17T15:28:28.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        },
        {
            "id": 5,
            "title": "updated title",
            "description": "updated desc",
            "user_id": 56,
            "created_at": "2021-02-17T15:45:03.000000Z",
            "updated_at": "2021-02-17T15:46:40.000000Z",
            "user": {
                "id": 56,
                "first_name": "john",
                "last_name": "doe",
                "email": "john@gmail.com",
                "phone": "1122334455",
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "active": 0,
                "created_at": "2021-02-18T12:14:01.000000Z",
                "updated_at": "2021-02-18T12:14:01.000000Z",
                "full_name": "john doe",
                "role_name": "CLIENT"
            }
        }
    ]
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-tasks" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-tasks"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tasks"></code></pre>
</div>
<div id="execution-error-GETapi-tasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tasks"></code></pre>
</div>
<form id="form-GETapi-tasks" data-method="GET" data-path="api/tasks" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-tasks', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-tasks" onclick="tryItOut('GETapi-tasks');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-tasks" onclick="cancelTryOut('GETapi-tasks');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-tasks" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/tasks</code></b>
</p>
<p>
<label id="auth-GETapi-tasks" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-tasks" data-component="header"></label>
</p>
</form>


## api/tasks

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/tasks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "demo task",
    "description": "demo task description"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Success! task created",
    "data": {
        "title": "demo task",
        "description": "demo task description",
        "user_id": 56,
        "updated_at": "2021-02-18T13:11:01.000000Z",
        "created_at": "2021-02-18T13:11:01.000000Z",
        "id": 8
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-tasks" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-tasks"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-tasks"></code></pre>
</div>
<div id="execution-error-POSTapi-tasks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-tasks"></code></pre>
</div>
<form id="form-POSTapi-tasks" data-method="POST" data-path="api/tasks" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-tasks', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-tasks" onclick="tryItOut('POSTapi-tasks');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-tasks" onclick="cancelTryOut('POSTapi-tasks');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-tasks" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/tasks</code></b>
</p>
<p>
<label id="auth-POSTapi-tasks" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-tasks" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-tasks" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-tasks" data-component="body" required  hidden>
<br>

</p>

</form>


## api/tasks/{task}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/tasks/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "data": {
        "id": 8,
        "title": "demo task",
        "description": "demo task description",
        "user_id": 56,
        "created_at": "2021-02-18T13:11:01.000000Z",
        "updated_at": "2021-02-18T13:11:01.000000Z",
        "user": {
            "id": 56,
            "first_name": "john",
            "last_name": "doe",
            "email": "john@gmail.com",
            "phone": "1122334455",
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "active": 0,
            "created_at": "2021-02-18T12:14:01.000000Z",
            "updated_at": "2021-02-18T12:14:01.000000Z",
            "full_name": "john doe",
            "role_name": "CLIENT"
        }
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-tasks--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-tasks--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-tasks--task-"></code></pre>
</div>
<div id="execution-error-GETapi-tasks--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-tasks--task-"></code></pre>
</div>
<form id="form-GETapi-tasks--task-" data-method="GET" data-path="api/tasks/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-tasks--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-tasks--task-" onclick="tryItOut('GETapi-tasks--task-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-tasks--task-" onclick="cancelTryOut('GETapi-tasks--task-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-tasks--task-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/tasks/{task}</code></b>
</p>
<p>
<label id="auth-GETapi-tasks--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-tasks--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="task" data-endpoint="GETapi-tasks--task-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/tasks/{task}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/tasks/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "demo task",
    "description": "demo task description"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Success! task updated",
    "data": {
        "id": 8,
        "title": "updated title",
        "description": "updated description",
        "user_id": 56,
        "created_at": "2021-02-18T13:11:01.000000Z",
        "updated_at": "2021-02-18T13:33:05.000000Z",
        "user": {
            "id": 56,
            "first_name": "john",
            "last_name": "doe",
            "email": "john@gmail.com",
            "phone": "1122334455",
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "active": 0,
            "created_at": "2021-02-18T12:14:01.000000Z",
            "updated_at": "2021-02-18T12:14:01.000000Z",
            "full_name": "john doe",
            "role_name": "CLIENT"
        }
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-PUTapi-tasks--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-tasks--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-tasks--task-"></code></pre>
</div>
<div id="execution-error-PUTapi-tasks--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-tasks--task-"></code></pre>
</div>
<form id="form-PUTapi-tasks--task-" data-method="PUT" data-path="api/tasks/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-tasks--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-tasks--task-" onclick="tryItOut('PUTapi-tasks--task-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-tasks--task-" onclick="cancelTryOut('PUTapi-tasks--task-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-tasks--task-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/tasks/{task}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/tasks/{task}</code></b>
</p>
<p>
<label id="auth-PUTapi-tasks--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-tasks--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="task" data-endpoint="PUTapi-tasks--task-" data-component="url" required  hidden>
<br>

</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="PUTapi-tasks--task-" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-tasks--task-" data-component="body" required  hidden>
<br>

</p>

</form>


## api/tasks/{task}

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/tasks/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "message": "Success! task deleted"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-DELETEapi-tasks--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-tasks--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-tasks--task-"></code></pre>
</div>
<div id="execution-error-DELETEapi-tasks--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-tasks--task-"></code></pre>
</div>
<form id="form-DELETEapi-tasks--task-" data-method="DELETE" data-path="api/tasks/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-tasks--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-tasks--task-" onclick="tryItOut('DELETEapi-tasks--task-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-tasks--task-" onclick="cancelTryOut('DELETEapi-tasks--task-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-tasks--task-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/tasks/{task}</code></b>
</p>
<p>
<label id="auth-DELETEapi-tasks--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-tasks--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>number</small>  &nbsp;
<input type="number" name="task" data-endpoint="DELETEapi-tasks--task-" data-component="url" required  hidden>
<br>

</p>
</form>



