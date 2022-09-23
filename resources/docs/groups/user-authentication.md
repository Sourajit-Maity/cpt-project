# User Authentication

APIs for managing basic auth functionality

## api/forgot-password




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/forgot-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "labore"
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
    "message": "We've sent an OTP in your email. Pleace check and confirm.",
    "data": []
}
```
<div id="execution-results-POSTapi-forgot-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-forgot-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-forgot-password"></code></pre>
</div>
<div id="execution-error-POSTapi-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-forgot-password"></code></pre>
</div>
<form id="form-POSTapi-forgot-password" data-method="POST" data-path="api/forgot-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-forgot-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-forgot-password" onclick="tryItOut('POSTapi-forgot-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-forgot-password" onclick="cancelTryOut('POSTapi-forgot-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-forgot-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/forgot-password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-forgot-password" data-component="body" required  hidden>
<br>
The Email of User.
</p>

</form>


## api/otp-validation




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/otp-validation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "email": "labore",
    "otp": 3344
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
    "token": "200|9YejiZ8Oy1ZPfHVk9hlUqbjdTfuv52QUrYszeWeW",
    "message": "Your OTP validation successful.",
    "data": []
}
```
<div id="execution-results-POSTapi-otp-validation" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-otp-validation"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-otp-validation"></code></pre>
</div>
<div id="execution-error-POSTapi-otp-validation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-otp-validation"></code></pre>
</div>
<form id="form-POSTapi-otp-validation" data-method="POST" data-path="api/otp-validation" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-otp-validation', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-otp-validation" onclick="tryItOut('POSTapi-otp-validation');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-otp-validation" onclick="cancelTryOut('POSTapi-otp-validation');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-otp-validation" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/otp-validation</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-otp-validation" data-component="body" required  hidden>
<br>
The email of User.
</p>
<p>
<b><code>otp</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="otp" data-endpoint="POSTapi-otp-validation" data-component="body" required  hidden>
<br>
The OTP of User.
</p>

</form>


## Security Question list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/security-question"
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
    "message": "Your security question list",
    "data": [
        {
            "id": 1,
            "security_question_name": "Hobby",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "security_question_name": "School",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "security_question_name": "College",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "security_question_name": "test1",
            "active": 1,
            "created_at": "2022-03-15T13:41:54.000000Z",
            "updated_at": "2022-03-15T13:48:06.000000Z"
        }
    ]
}
```
<div id="execution-results-GETapi-security-question" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-security-question"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-security-question"></code></pre>
</div>
<div id="execution-error-GETapi-security-question" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-security-question"></code></pre>
</div>
<form id="form-GETapi-security-question" data-method="GET" data-path="api/security-question" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-security-question', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-security-question" onclick="tryItOut('GETapi-security-question');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-security-question" onclick="cancelTryOut('GETapi-security-question');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-security-question" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/security-question</code></b>
</p>
<p>
<label id="auth-GETapi-security-question" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-security-question" data-component="header"></label>
</p>
</form>


## Terms and Condition list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/terms-condition"
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
    "message": "Your terms list",
    "data": [
        {
            "id": 1,
            "title": "Copyright Policy",
            "slug": "copyright-policy",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:13.000000Z",
            "updated_at": "2022-03-16T12:35:13.000000Z"
        },
        {
            "id": 2,
            "title": "Terms of Use",
            "slug": "terms-of-use",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:14.000000Z",
            "updated_at": "2022-03-16T12:35:14.000000Z"
        },
        {
            "id": 3,
            "title": "Privacy Policy",
            "slug": "privacy-policy",
            "text_content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam",
            "image": null,
            "content_1_title": null,
            "content_1_text": null,
            "content_2_title": null,
            "content_2_text": null,
            "content_3_title": null,
            "content_3_text": null,
            "created_at": "2022-03-16T12:35:14.000000Z",
            "updated_at": "2022-03-16T12:35:14.000000Z"
        }
    ]
}
```
<div id="execution-results-GETapi-terms-condition" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-terms-condition"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-terms-condition"></code></pre>
</div>
<div id="execution-error-GETapi-terms-condition" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-terms-condition"></code></pre>
</div>
<form id="form-GETapi-terms-condition" data-method="GET" data-path="api/terms-condition" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-terms-condition', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-terms-condition" onclick="tryItOut('GETapi-terms-condition');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-terms-condition" onclick="cancelTryOut('GETapi-terms-condition');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-terms-condition" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/terms-condition</code></b>
</p>
<p>
<label id="auth-GETapi-terms-condition" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-terms-condition" data-component="header"></label>
</p>
</form>


## api/change-password




> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/change-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "password": "est"
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
    "message": "Your Password successfully changed.",
    "data": []
}
```
<div id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-change-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password"></code></pre>
</div>
<form id="form-POSTapi-change-password" data-method="POST" data-path="api/change-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-change-password" onclick="tryItOut('POSTapi-change-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-change-password" onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-change-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/change-password</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
The password of User.
</p>

</form>


## api/notifications

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notifications"
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
        "unreadNotification": 1,
        "notification": [
            {
                "id": "63b5595a-5333-4f8a-a70d-0344020ac68b",
                "type": "App\\Notifications\\UserNotification",
                "notifiable_type": "App\\Models\\User",
                "notifiable_id": 5,
                "data": {
                    "type": "Application",
                    "title": "Application",
                    "body": "accepted",
                    "application_id": 2
                },
                "read_at": null,
                "created_at": "2022-03-04T11:53:06.000000Z",
                "updated_at": "2022-03-04T11:53:06.000000Z"
            }
        ]
    }
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-notifications" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-notifications"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-notifications"></code></pre>
</div>
<div id="execution-error-GETapi-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-notifications"></code></pre>
</div>
<form id="form-GETapi-notifications" data-method="GET" data-path="api/notifications" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-notifications', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-notifications" onclick="tryItOut('GETapi-notifications');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-notifications" onclick="cancelTryOut('GETapi-notifications');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-notifications" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/notifications</code></b>
</p>
<p>
<label id="auth-GETapi-notifications" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-notifications" data-component="header"></label>
</p>
</form>


## api/delete-notification

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/delete-notification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "notification_id": "63b5595a-5333-4f8a-a70d-0344020ac68b\n * @response {\n\"success\": true,\n\"message\": \"You have successfully delete the notification.\"\n}"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-delete-notification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-delete-notification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-delete-notification"></code></pre>
</div>
<div id="execution-error-POSTapi-delete-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-delete-notification"></code></pre>
</div>
<form id="form-POSTapi-delete-notification" data-method="POST" data-path="api/delete-notification" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-delete-notification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-delete-notification" onclick="tryItOut('POSTapi-delete-notification');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-delete-notification" onclick="cancelTryOut('POSTapi-delete-notification');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-delete-notification" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/delete-notification</code></b>
</p>
<p>
<label id="auth-POSTapi-delete-notification" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-delete-notification" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>notification_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="notification_id" data-endpoint="POSTapi-delete-notification" data-component="body" required  hidden>
<br>
The id of notification
</p>

</form>


## api/read-notification

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/read-notification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "notification_id": "63b5595a-5333-4f8a-a70d-0344020ac68b\n * @response {\n\"success\": true,\n\"message\": \"You have successfully view the notification.\"\n}"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-read-notification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-read-notification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-read-notification"></code></pre>
</div>
<div id="execution-error-POSTapi-read-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-read-notification"></code></pre>
</div>
<form id="form-POSTapi-read-notification" data-method="POST" data-path="api/read-notification" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-read-notification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-read-notification" onclick="tryItOut('POSTapi-read-notification');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-read-notification" onclick="cancelTryOut('POSTapi-read-notification');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-read-notification" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/read-notification</code></b>
</p>
<p>
<label id="auth-POSTapi-read-notification" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-read-notification" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>notification_id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="notification_id" data-endpoint="POSTapi-read-notification" data-component="body" required  hidden>
<br>
The id of notification
</p>

</form>


## Experience list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/experience-list"
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
    "message": "Your experience list",
    "data": [
        {
            "id": 1,
            "from_year": "1",
            "to_year": "2",
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "from_year": "2",
            "to_year": "3",
            "status": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "from_year": "3",
            "to_year": "5",
            "status": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```
<div id="execution-results-GETapi-experience-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-experience-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-experience-list"></code></pre>
</div>
<div id="execution-error-GETapi-experience-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-experience-list"></code></pre>
</div>
<form id="form-GETapi-experience-list" data-method="GET" data-path="api/experience-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-experience-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-experience-list" onclick="tryItOut('GETapi-experience-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-experience-list" onclick="cancelTryOut('GETapi-experience-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-experience-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/experience-list</code></b>
</p>
<p>
<label id="auth-GETapi-experience-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-experience-list" data-component="header"></label>
</p>
</form>


## Shift time list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/shift-timing-list"
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
    "message": "Your shift time list",
    "data": [
        {
            "id": 1,
            "shift_name": "Morning",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "shift_name": "Day",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "shift_name": "Night",
            "shift_time": "8",
            "active": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```
<div id="execution-results-GETapi-shift-timing-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-shift-timing-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-shift-timing-list"></code></pre>
</div>
<div id="execution-error-GETapi-shift-timing-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-shift-timing-list"></code></pre>
</div>
<form id="form-GETapi-shift-timing-list" data-method="GET" data-path="api/shift-timing-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-shift-timing-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-shift-timing-list" onclick="tryItOut('GETapi-shift-timing-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-shift-timing-list" onclick="cancelTryOut('GETapi-shift-timing-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-shift-timing-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/shift-timing-list</code></b>
</p>
<p>
<label id="auth-GETapi-shift-timing-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-shift-timing-list" data-component="header"></label>
</p>
</form>


## Nurse Type list

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse-type-list"
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
    "message": "Your nurse type list",
    "data": [
        {
            "id": 1,
            "type_name": "CAN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "type_name": "LPN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "type_name": "RN",
            "active": 1,
            "created_at": null,
            "updated_at": null
        }
    ]
}
```
<div id="execution-results-GETapi-nurse-type-list" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-type-list"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-type-list"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-type-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-type-list"></code></pre>
</div>
<form id="form-GETapi-nurse-type-list" data-method="GET" data-path="api/nurse-type-list" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-type-list', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-type-list" onclick="tryItOut('GETapi-nurse-type-list');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-type-list" onclick="cancelTryOut('GETapi-nurse-type-list');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-type-list" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse-type-list</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-type-list" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-type-list" data-component="header"></label>
</p>
</form>



