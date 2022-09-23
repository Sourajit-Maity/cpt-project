# Nurse Payment Details

APIs for managing nurse payment functionality

## api/nurse/add-edit-account

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/add-edit-account"
);

let headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

const body = new FormData();
body.append('bank_name', 'DBS');
body.append('routing_number', '54555');
body.append('account_number', '55446546454545');
body.append('account_holder_name', 'Jhon doe');
body.append('additional_document', document.querySelector('input[name="additional_document"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": true,
    "status_code": 200,
    "message": "Successfully added"
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-POSTapi-nurse-add-edit-account" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-nurse-add-edit-account"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-nurse-add-edit-account"></code></pre>
</div>
<div id="execution-error-POSTapi-nurse-add-edit-account" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-nurse-add-edit-account"></code></pre>
</div>
<form id="form-POSTapi-nurse-add-edit-account" data-method="POST" data-path="api/nurse/add-edit-account" data-authed="1" data-hasfiles="1" data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-nurse-add-edit-account', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-nurse-add-edit-account" onclick="tryItOut('POSTapi-nurse-add-edit-account');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-nurse-add-edit-account" onclick="cancelTryOut('POSTapi-nurse-add-edit-account');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-nurse-add-edit-account" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/nurse/add-edit-account</code></b>
</p>
<p>
<label id="auth-POSTapi-nurse-add-edit-account" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-nurse-add-edit-account" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bank_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="bank_name" data-endpoint="POSTapi-nurse-add-edit-account" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>routing_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="routing_number" data-endpoint="POSTapi-nurse-add-edit-account" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>account_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="account_number" data-endpoint="POSTapi-nurse-add-edit-account" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>account_holder_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="account_holder_name" data-endpoint="POSTapi-nurse-add-edit-account" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>additional_document</code></b>&nbsp;&nbsp;<small>file</small>  &nbsp;
<input type="file" name="additional_document" data-endpoint="POSTapi-nurse-add-edit-account" data-component="body" required  hidden>
<br>

</p>

</form>


## api/nurse/account-details

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/nurse/account-details"
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
"status_code": 200,
"message": "Success",
"data": {
"id": 2,
"bank_name": "SB",
"routing_number": "454545",
"account_number": "454854",
"account_holder_name": "Jhon doe",
}
}
```
> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-nurse-account-details" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-nurse-account-details"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-nurse-account-details"></code></pre>
</div>
<div id="execution-error-GETapi-nurse-account-details" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-nurse-account-details"></code></pre>
</div>
<form id="form-GETapi-nurse-account-details" data-method="GET" data-path="api/nurse/account-details" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer {token}"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-nurse-account-details', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-nurse-account-details" onclick="tryItOut('GETapi-nurse-account-details');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-nurse-account-details" onclick="cancelTryOut('GETapi-nurse-account-details');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-nurse-account-details" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/nurse/account-details</code></b>
</p>
<p>
<label id="auth-GETapi-nurse-account-details" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-nurse-account-details" data-component="header"></label>
</p>
</form>



