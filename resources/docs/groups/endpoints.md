# Endpoints


## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/sanctum/csrf-cookie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
</form>


## api/acquisition/trigger/alert




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/acquisition/trigger/alert" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/acquisition/trigger/alert"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETapi-acquisition-trigger-alert" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-acquisition-trigger-alert"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-acquisition-trigger-alert"></code></pre>
</div>
<div id="execution-error-GETapi-acquisition-trigger-alert" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-acquisition-trigger-alert"></code></pre>
</div>
<form id="form-GETapi-acquisition-trigger-alert" data-method="GET" data-path="api/acquisition/trigger/alert" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-acquisition-trigger-alert', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-acquisition-trigger-alert" onclick="tryItOut('GETapi-acquisition-trigger-alert');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-acquisition-trigger-alert" onclick="cancelTryOut('GETapi-acquisition-trigger-alert');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-acquisition-trigger-alert" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/acquisition/trigger/alert</code></b>
</p>
</form>


## api/acquisition/trigger/alert/{asset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/acquisition/trigger/alert/fuga" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/acquisition/trigger/alert/fuga"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETapi-acquisition-trigger-alert--asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-acquisition-trigger-alert--asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-acquisition-trigger-alert--asset-"></code></pre>
</div>
<div id="execution-error-GETapi-acquisition-trigger-alert--asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-acquisition-trigger-alert--asset-"></code></pre>
</div>
<form id="form-GETapi-acquisition-trigger-alert--asset-" data-method="GET" data-path="api/acquisition/trigger/alert/{asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-acquisition-trigger-alert--asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-acquisition-trigger-alert--asset-" onclick="tryItOut('GETapi-acquisition-trigger-alert--asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-acquisition-trigger-alert--asset-" onclick="cancelTryOut('GETapi-acquisition-trigger-alert--asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-acquisition-trigger-alert--asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/acquisition/trigger/alert/{asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETapi-acquisition-trigger-alert--asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/gaphubers/non_member/sms




> Example request:

```bash
curl -X POST \
    "http://localhost/api/gaphubers/non_member/sms" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/gaphubers/non_member/sms"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-gaphubers-non_member-sms" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-gaphubers-non_member-sms"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-gaphubers-non_member-sms"></code></pre>
</div>
<div id="execution-error-POSTapi-gaphubers-non_member-sms" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-gaphubers-non_member-sms"></code></pre>
</div>
<form id="form-POSTapi-gaphubers-non_member-sms" data-method="POST" data-path="api/gaphubers/non_member/sms" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-gaphubers-non_member-sms', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-gaphubers-non_member-sms" onclick="tryItOut('POSTapi-gaphubers-non_member-sms');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-gaphubers-non_member-sms" onclick="cancelTryOut('POSTapi-gaphubers-non_member-sms');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-gaphubers-non_member-sms" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/gaphubers/non_member/sms</code></b>
</p>
</form>


## api/mygap/newregister




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mygap/newregister" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/newregister"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-mygap-newregister" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mygap-newregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mygap-newregister"></code></pre>
</div>
<div id="execution-error-POSTapi-mygap-newregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mygap-newregister"></code></pre>
</div>
<form id="form-POSTapi-mygap-newregister" data-method="POST" data-path="api/mygap/newregister" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mygap-newregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mygap-newregister" onclick="tryItOut('POSTapi-mygap-newregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mygap-newregister" onclick="cancelTryOut('POSTapi-mygap-newregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mygap-newregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mygap/newregister</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mygap/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-mygap-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mygap-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mygap-login"></code></pre>
</div>
<div id="execution-error-POSTapi-mygap-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mygap-login"></code></pre>
</div>
<form id="form-POSTapi-mygap-login" data-method="POST" data-path="api/mygap/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mygap-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mygap-login" onclick="tryItOut('POSTapi-mygap-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mygap-login" onclick="cancelTryOut('POSTapi-mygap-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mygap-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mygap/login</code></b>
</p>
</form>


## api/user




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
</form>


## api/app/calculator




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/calculator" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/calculator"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-calculator" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-calculator"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-calculator"></code></pre>
</div>
<div id="execution-error-POSTapi-app-calculator" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-calculator"></code></pre>
</div>
<form id="form-POSTapi-app-calculator" data-method="POST" data-path="api/app/calculator" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-calculator', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-calculator" onclick="tryItOut('POSTapi-app-calculator');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-calculator" onclick="cancelTryOut('POSTapi-app-calculator');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-calculator" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/calculator</code></b>
</p>
</form>


## api/app/stepquestions




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/stepquestions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/stepquestions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-stepquestions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-stepquestions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-stepquestions"></code></pre>
</div>
<div id="execution-error-POSTapi-app-stepquestions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-stepquestions"></code></pre>
</div>
<form id="form-POSTapi-app-stepquestions" data-method="POST" data-path="api/app/stepquestions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-stepquestions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-stepquestions" onclick="tryItOut('POSTapi-app-stepquestions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-stepquestions" onclick="cancelTryOut('POSTapi-app-stepquestions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-stepquestions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/stepquestions</code></b>
</p>
</form>


## * Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/seveng" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/seveng"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-seveng" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-seveng"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-seveng"></code></pre>
</div>
<div id="execution-error-POSTapi-app-seveng" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-seveng"></code></pre>
</div>
<form id="form-POSTapi-app-seveng" data-method="POST" data-path="api/app/seveng" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-seveng', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-seveng" onclick="tryItOut('POSTapi-app-seveng');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-seveng" onclick="cancelTryOut('POSTapi-app-seveng');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-seveng" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/seveng</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/bespoke" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/bespoke"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-bespoke" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-bespoke"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-bespoke"></code></pre>
</div>
<div id="execution-error-GETapi-app-bespoke" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-bespoke"></code></pre>
</div>
<form id="form-GETapi-app-bespoke" data-method="GET" data-path="api/app/bespoke" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-bespoke', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-bespoke" onclick="tryItOut('GETapi-app-bespoke');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-bespoke" onclick="cancelTryOut('GETapi-app-bespoke');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-bespoke" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/bespoke</code></b>
</p>
</form>


## api/app/bespoke




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/bespoke" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/bespoke"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-bespoke" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-bespoke"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-bespoke"></code></pre>
</div>
<div id="execution-error-POSTapi-app-bespoke" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-bespoke"></code></pre>
</div>
<form id="form-POSTapi-app-bespoke" data-method="POST" data-path="api/app/bespoke" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-bespoke', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-bespoke" onclick="tryItOut('POSTapi-app-bespoke');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-bespoke" onclick="cancelTryOut('POSTapi-app-bespoke');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-bespoke" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/bespoke</code></b>
</p>
</form>


## api/app/bespoke/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/bespoke/minima" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/bespoke/minima"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-bespoke--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-bespoke--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-bespoke--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-bespoke--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-bespoke--id-"></code></pre>
</div>
<form id="form-POSTapi-app-bespoke--id-" data-method="POST" data-path="api/app/bespoke/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-bespoke--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-bespoke--id-" onclick="tryItOut('POSTapi-app-bespoke--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-bespoke--id-" onclick="cancelTryOut('POSTapi-app-bespoke--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-bespoke--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/bespoke/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-bespoke--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/dashboard




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/dashboard"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-dashboard" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-dashboard"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-dashboard"></code></pre>
</div>
<div id="execution-error-GETapi-app-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-dashboard"></code></pre>
</div>
<form id="form-GETapi-app-dashboard" data-method="GET" data-path="api/app/dashboard" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-dashboard', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-dashboard" onclick="tryItOut('GETapi-app-dashboard');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-dashboard" onclick="cancelTryOut('GETapi-app-dashboard');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-dashboard" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/dashboard</code></b>
</p>
</form>


## api/app/dashboard/tiles




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/dashboard/tiles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/dashboard/tiles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-dashboard-tiles" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-dashboard-tiles"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-dashboard-tiles"></code></pre>
</div>
<div id="execution-error-POSTapi-app-dashboard-tiles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-dashboard-tiles"></code></pre>
</div>
<form id="form-POSTapi-app-dashboard-tiles" data-method="POST" data-path="api/app/dashboard/tiles" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-dashboard-tiles', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-dashboard-tiles" onclick="tryItOut('POSTapi-app-dashboard-tiles');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-dashboard-tiles" onclick="cancelTryOut('POSTapi-app-dashboard-tiles');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-dashboard-tiles" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/dashboard/tiles</code></b>
</p>
</form>


## api/app/seveng




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/seveng" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/seveng"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-seveng" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-seveng"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-seveng"></code></pre>
</div>
<div id="execution-error-GETapi-app-seveng" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-seveng"></code></pre>
</div>
<form id="form-GETapi-app-seveng" data-method="GET" data-path="api/app/seveng" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-seveng', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-seveng" onclick="tryItOut('GETapi-app-seveng');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-seveng" onclick="cancelTryOut('GETapi-app-seveng');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-seveng" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/seveng</code></b>
</p>
</form>


## api/app/seveng/edit




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/seveng/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/seveng/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-seveng-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-seveng-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-seveng-edit"></code></pre>
</div>
<div id="execution-error-GETapi-app-seveng-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-seveng-edit"></code></pre>
</div>
<form id="form-GETapi-app-seveng-edit" data-method="GET" data-path="api/app/seveng/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-seveng-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-seveng-edit" onclick="tryItOut('GETapi-app-seveng-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-seveng-edit" onclick="cancelTryOut('GETapi-app-seveng-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-seveng-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/seveng/edit</code></b>
</p>
</form>


## api/app/snapshot




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/snapshot" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/snapshot"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-snapshot" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-snapshot"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-snapshot"></code></pre>
</div>
<div id="execution-error-GETapi-app-snapshot" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-snapshot"></code></pre>
</div>
<form id="form-GETapi-app-snapshot" data-method="GET" data-path="api/app/snapshot" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-snapshot', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-snapshot" onclick="tryItOut('GETapi-app-snapshot');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-snapshot" onclick="cancelTryOut('GETapi-app-snapshot');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-snapshot" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/snapshot</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/reminder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/reminder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-reminder" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-reminder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-reminder"></code></pre>
</div>
<div id="execution-error-GETapi-app-reminder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-reminder"></code></pre>
</div>
<form id="form-GETapi-app-reminder" data-method="GET" data-path="api/app/reminder" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-reminder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-reminder" onclick="tryItOut('GETapi-app-reminder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-reminder" onclick="cancelTryOut('GETapi-app-reminder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-reminder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/reminder</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/reminder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/reminder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-reminder" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-reminder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-reminder"></code></pre>
</div>
<div id="execution-error-POSTapi-app-reminder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-reminder"></code></pre>
</div>
<form id="form-POSTapi-app-reminder" data-method="POST" data-path="api/app/reminder" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-reminder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-reminder" onclick="tryItOut('POSTapi-app-reminder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-reminder" onclick="cancelTryOut('POSTapi-app-reminder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-reminder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/reminder</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/reminder/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/reminder/rerum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-GETapi-app-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-reminder--reminder-"></code></pre>
</div>
<form id="form-GETapi-app-reminder--reminder-" data-method="GET" data-path="api/app/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-reminder--reminder-" onclick="tryItOut('GETapi-app-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-reminder--reminder-" onclick="cancelTryOut('GETapi-app-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="GETapi-app-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://localhost/api/app/reminder/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/reminder/eum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTapi-app-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-app-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-app-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-PUTapi-app-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-app-reminder--reminder-"></code></pre>
</div>
<form id="form-PUTapi-app-reminder--reminder-" data-method="PUT" data-path="api/app/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-app-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-app-reminder--reminder-" onclick="tryItOut('PUTapi-app-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-app-reminder--reminder-" onclick="cancelTryOut('PUTapi-app-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-app-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/app/reminder/{reminder}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/app/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="PUTapi-app-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/app/reminder/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/reminder/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-app-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-app-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-app-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-DELETEapi-app-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-app-reminder--reminder-"></code></pre>
</div>
<form id="form-DELETEapi-app-reminder--reminder-" data-method="DELETE" data-path="api/app/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-app-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-app-reminder--reminder-" onclick="tryItOut('DELETEapi-app-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-app-reminder--reminder-" onclick="cancelTryOut('DELETEapi-app-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-app-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/app/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="DELETEapi-app-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/actionplan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/actionplan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-actionplan" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-actionplan"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-actionplan"></code></pre>
</div>
<div id="execution-error-GETapi-app-actionplan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-actionplan"></code></pre>
</div>
<form id="form-GETapi-app-actionplan" data-method="GET" data-path="api/app/actionplan" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-actionplan', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-actionplan" onclick="tryItOut('GETapi-app-actionplan');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-actionplan" onclick="cancelTryOut('GETapi-app-actionplan');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-actionplan" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/actionplan</code></b>
</p>
</form>


## api/app/todayplan




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/todayplan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/todayplan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-todayplan" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-todayplan"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-todayplan"></code></pre>
</div>
<div id="execution-error-GETapi-app-todayplan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-todayplan"></code></pre>
</div>
<form id="form-GETapi-app-todayplan" data-method="GET" data-path="api/app/todayplan" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-todayplan', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-todayplan" onclick="tryItOut('GETapi-app-todayplan');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-todayplan" onclick="cancelTryOut('GETapi-app-todayplan');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-todayplan" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/todayplan</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/actionplan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/actionplan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-actionplan" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-actionplan"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-actionplan"></code></pre>
</div>
<div id="execution-error-POSTapi-app-actionplan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-actionplan"></code></pre>
</div>
<form id="form-POSTapi-app-actionplan" data-method="POST" data-path="api/app/actionplan" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-actionplan', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-actionplan" onclick="tryItOut('POSTapi-app-actionplan');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-actionplan" onclick="cancelTryOut('POSTapi-app-actionplan');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-actionplan" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/actionplan</code></b>
</p>
</form>


## api/app/acquisition/favourite




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/acquisition/favourite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/favourite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-acquisition-favourite" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-acquisition-favourite"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-acquisition-favourite"></code></pre>
</div>
<div id="execution-error-GETapi-app-acquisition-favourite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-acquisition-favourite"></code></pre>
</div>
<form id="form-GETapi-app-acquisition-favourite" data-method="GET" data-path="api/app/acquisition/favourite" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-acquisition-favourite', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-acquisition-favourite" onclick="tryItOut('GETapi-app-acquisition-favourite');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-acquisition-favourite" onclick="cancelTryOut('GETapi-app-acquisition-favourite');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-acquisition-favourite" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/acquisition/favourite</code></b>
</p>
</form>


## api/app/acquisition/favourite/ganp




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/acquisition/favourite/ganp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/favourite/ganp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-acquisition-favourite-ganp" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-acquisition-favourite-ganp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-acquisition-favourite-ganp"></code></pre>
</div>
<div id="execution-error-GETapi-app-acquisition-favourite-ganp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-acquisition-favourite-ganp"></code></pre>
</div>
<form id="form-GETapi-app-acquisition-favourite-ganp" data-method="GET" data-path="api/app/acquisition/favourite/ganp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-acquisition-favourite-ganp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-acquisition-favourite-ganp" onclick="tryItOut('GETapi-app-acquisition-favourite-ganp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-acquisition-favourite-ganp" onclick="cancelTryOut('GETapi-app-acquisition-favourite-ganp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-acquisition-favourite-ganp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/acquisition/favourite/ganp</code></b>
</p>
</form>


## api/app/acquisition/favourite/{asset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/acquisition/favourite/ea" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/favourite/ea"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-acquisition-favourite--asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-acquisition-favourite--asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-acquisition-favourite--asset-"></code></pre>
</div>
<div id="execution-error-GETapi-app-acquisition-favourite--asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-acquisition-favourite--asset-"></code></pre>
</div>
<form id="form-GETapi-app-acquisition-favourite--asset-" data-method="GET" data-path="api/app/acquisition/favourite/{asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-acquisition-favourite--asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-acquisition-favourite--asset-" onclick="tryItOut('GETapi-app-acquisition-favourite--asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-acquisition-favourite--asset-" onclick="cancelTryOut('GETapi-app-acquisition-favourite--asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-acquisition-favourite--asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/acquisition/favourite/{asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETapi-app-acquisition-favourite--asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/acquisition/interest/reap/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/acquisition/interest/reap/placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/interest/reap/placeat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-acquisition-interest-reap--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-acquisition-interest-reap--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-acquisition-interest-reap--sasset-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-acquisition-interest-reap--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-acquisition-interest-reap--sasset-"></code></pre>
</div>
<form id="form-POSTapi-app-acquisition-interest-reap--sasset-" data-method="POST" data-path="api/app/acquisition/interest/reap/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-acquisition-interest-reap--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-acquisition-interest-reap--sasset-" onclick="tryItOut('POSTapi-app-acquisition-interest-reap--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-acquisition-interest-reap--sasset-" onclick="cancelTryOut('POSTapi-app-acquisition-interest-reap--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-acquisition-interest-reap--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/acquisition/interest/reap/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTapi-app-acquisition-interest-reap--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/acquisition/investment/reap/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/acquisition/investment/reap/distinctio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/investment/reap/distinctio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-acquisition-investment-reap--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-acquisition-investment-reap--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-acquisition-investment-reap--sasset-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-acquisition-investment-reap--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-acquisition-investment-reap--sasset-"></code></pre>
</div>
<form id="form-POSTapi-app-acquisition-investment-reap--sasset-" data-method="POST" data-path="api/app/acquisition/investment/reap/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-acquisition-investment-reap--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-acquisition-investment-reap--sasset-" onclick="tryItOut('POSTapi-app-acquisition-investment-reap--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-acquisition-investment-reap--sasset-" onclick="cancelTryOut('POSTapi-app-acquisition-investment-reap--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-acquisition-investment-reap--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/acquisition/investment/reap/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTapi-app-acquisition-investment-reap--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/acquisition/investment/ganp/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/acquisition/investment/ganp/est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/acquisition/investment/ganp/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-acquisition-investment-ganp--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-acquisition-investment-ganp--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-acquisition-investment-ganp--sasset-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-acquisition-investment-ganp--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-acquisition-investment-ganp--sasset-"></code></pre>
</div>
<form id="form-POSTapi-app-acquisition-investment-ganp--sasset-" data-method="POST" data-path="api/app/acquisition/investment/ganp/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-acquisition-investment-ganp--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-acquisition-investment-ganp--sasset-" onclick="tryItOut('POSTapi-app-acquisition-investment-ganp--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-acquisition-investment-ganp--sasset-" onclick="cancelTryOut('POSTapi-app-acquisition-investment-ganp--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-acquisition-investment-ganp--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/acquisition/investment/ganp/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTapi-app-acquisition-investment-ganp--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/profile




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-profile"></code></pre>
</div>
<div id="execution-error-GETapi-app-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-profile"></code></pre>
</div>
<form id="form-GETapi-app-profile" data-method="GET" data-path="api/app/profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-profile" onclick="tryItOut('GETapi-app-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-profile" onclick="cancelTryOut('GETapi-app-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/profile</code></b>
</p>
</form>


## api/app/tools/preference/exchange




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/tools/preference/exchange" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/tools/preference/exchange"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-tools-preference-exchange" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-tools-preference-exchange"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-tools-preference-exchange"></code></pre>
</div>
<div id="execution-error-POSTapi-app-tools-preference-exchange" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-tools-preference-exchange"></code></pre>
</div>
<form id="form-POSTapi-app-tools-preference-exchange" data-method="POST" data-path="api/app/tools/preference/exchange" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-tools-preference-exchange', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-tools-preference-exchange" onclick="tryItOut('POSTapi-app-tools-preference-exchange');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-tools-preference-exchange" onclick="cancelTryOut('POSTapi-app-tools-preference-exchange');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-tools-preference-exchange" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/tools/preference/exchange</code></b>
</p>
</form>


## api/app/default/picture




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/default/picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/default/picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-default-picture" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-default-picture"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-default-picture"></code></pre>
</div>
<div id="execution-error-POSTapi-app-default-picture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-default-picture"></code></pre>
</div>
<form id="form-POSTapi-app-default-picture" data-method="POST" data-path="api/app/default/picture" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-default-picture', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-default-picture" onclick="tryItOut('POSTapi-app-default-picture');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-default-picture" onclick="cancelTryOut('POSTapi-app-default-picture');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-default-picture" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/default/picture</code></b>
</p>
</form>


## api/app/picture




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-picture" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-picture"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-picture"></code></pre>
</div>
<div id="execution-error-POSTapi-app-picture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-picture"></code></pre>
</div>
<form id="form-POSTapi-app-picture" data-method="POST" data-path="api/app/picture" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-picture', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-picture" onclick="tryItOut('POSTapi-app-picture');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-picture" onclick="cancelTryOut('POSTapi-app-picture');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-picture" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/picture</code></b>
</p>
</form>


## api/app/editprofile




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/editprofile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/editprofile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-editprofile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-editprofile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-editprofile"></code></pre>
</div>
<div id="execution-error-POSTapi-app-editprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-editprofile"></code></pre>
</div>
<form id="form-POSTapi-app-editprofile" data-method="POST" data-path="api/app/editprofile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-editprofile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-editprofile" onclick="tryItOut('POSTapi-app-editprofile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-editprofile" onclick="cancelTryOut('POSTapi-app-editprofile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-editprofile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/editprofile</code></b>
</p>
</form>


## api/app/seed




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/seed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/seed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-seed" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-seed"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-seed"></code></pre>
</div>
<div id="execution-error-GETapi-app-seed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-seed"></code></pre>
</div>
<form id="form-GETapi-app-seed" data-method="GET" data-path="api/app/seed" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-seed', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-seed" onclick="tryItOut('GETapi-app-seed');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-seed" onclick="cancelTryOut('GETapi-app-seed');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-seed" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/seed</code></b>
</p>
</form>


## api/app/seed/store




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/seed/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/seed/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-seed-store" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-seed-store"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-seed-store"></code></pre>
</div>
<div id="execution-error-POSTapi-app-seed-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-seed-store"></code></pre>
</div>
<form id="form-POSTapi-app-seed-store" data-method="POST" data-path="api/app/seed/store" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-seed-store', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-seed-store" onclick="tryItOut('POSTapi-app-seed-store');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-seed-store" onclick="cancelTryOut('POSTapi-app-seed-store');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-seed-store" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/seed/store</code></b>
</p>
</form>


## Add Wheel Controller




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/tiles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/tiles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-tiles" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-tiles"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-tiles"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-tiles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-tiles"></code></pre>
</div>
<form id="form-GETapi-app-360-tiles" data-method="GET" data-path="api/app/360/tiles" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-tiles', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-tiles" onclick="tryItOut('GETapi-app-360-tiles');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-tiles" onclick="cancelTryOut('GETapi-app-360-tiles');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-tiles" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/tiles</code></b>
</p>
</form>


## api/app/360/ilab




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/ilab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/ilab"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-ilab" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-ilab"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-ilab"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-ilab" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-ilab"></code></pre>
</div>
<form id="form-GETapi-app-360-ilab" data-method="GET" data-path="api/app/360/ilab" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-ilab', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-ilab" onclick="tryItOut('GETapi-app-360-ilab');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-ilab" onclick="cancelTryOut('GETapi-app-360-ilab');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-ilab" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/ilab</code></b>
</p>
</form>


## api/app/360/net




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/net" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/net"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-net" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-net"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-net"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-net" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-net"></code></pre>
</div>
<form id="form-GETapi-app-360-net" data-method="GET" data-path="api/app/360/net" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-net', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-net" onclick="tryItOut('GETapi-app-360-net');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-net" onclick="cancelTryOut('GETapi-app-360-net');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-net" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/net</code></b>
</p>
</form>


## api/app/360/cash




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/cash" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/cash"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-cash" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-cash"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-cash"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-cash" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-cash"></code></pre>
</div>
<form id="form-GETapi-app-360-cash" data-method="GET" data-path="api/app/360/cash" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-cash', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-cash" onclick="tryItOut('GETapi-app-360-cash');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-cash" onclick="cancelTryOut('GETapi-app-360-cash');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-cash" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/cash</code></b>
</p>
</form>


## api/app/360/liability




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/liability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/liability"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-liability" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-liability"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-liability"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-liability" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-liability"></code></pre>
</div>
<form id="form-GETapi-app-360-liability" data-method="GET" data-path="api/app/360/liability" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-liability', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-liability" onclick="tryItOut('GETapi-app-360-liability');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-liability" onclick="cancelTryOut('GETapi-app-360-liability');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-liability" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/liability</code></b>
</p>
</form>


## api/app/360/mortgage




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/mortgage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/mortgage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-mortgage" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-mortgage"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-mortgage"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-mortgage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-mortgage"></code></pre>
</div>
<form id="form-GETapi-app-360-mortgage" data-method="GET" data-path="api/app/360/mortgage" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-mortgage', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-mortgage" onclick="tryItOut('GETapi-app-360-mortgage');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-mortgage" onclick="cancelTryOut('GETapi-app-360-mortgage');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-mortgage" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/mortgage</code></b>
</p>
</form>


## api/app/360/equity




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/equity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/equity"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-equity" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-equity"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-equity"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-equity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-equity"></code></pre>
</div>
<form id="form-GETapi-app-360-equity" data-method="GET" data-path="api/app/360/equity" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-equity', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-equity" onclick="tryItOut('GETapi-app-360-equity');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-equity" onclick="cancelTryOut('GETapi-app-360-equity');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-equity" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/equity</code></b>
</p>
</form>


## api/app/360/equity/info




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/equity/info" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/equity/info"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-equity-info" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-equity-info"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-equity-info"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-equity-info" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-equity-info"></code></pre>
</div>
<form id="form-GETapi-app-360-equity-info" data-method="GET" data-path="api/app/360/equity/info" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-equity-info', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-equity-info" onclick="tryItOut('GETapi-app-360-equity-info');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-equity-info" onclick="cancelTryOut('GETapi-app-360-equity-info');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-equity-info" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/equity/info</code></b>
</p>
</form>


## api/app/360/protection




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/protection" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/protection"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-protection" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-protection"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-protection"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-protection" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-protection"></code></pre>
</div>
<form id="form-GETapi-app-360-protection" data-method="GET" data-path="api/app/360/protection" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-protection', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-protection" onclick="tryItOut('GETapi-app-360-protection');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-protection" onclick="cancelTryOut('GETapi-app-360-protection');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-protection" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/protection</code></b>
</p>
</form>


## api/app/360/expenditure




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/expenditure" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/expenditure"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-expenditure" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-expenditure"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-expenditure"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-expenditure" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-expenditure"></code></pre>
</div>
<form id="form-GETapi-app-360-expenditure" data-method="GET" data-path="api/app/360/expenditure" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-expenditure', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-expenditure" onclick="tryItOut('GETapi-app-360-expenditure');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-expenditure" onclick="cancelTryOut('GETapi-app-360-expenditure');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-expenditure" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/expenditure</code></b>
</p>
</form>


## api/app/360/philantrophy




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/philantrophy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/philantrophy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-philantrophy" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-philantrophy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-philantrophy"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-philantrophy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-philantrophy"></code></pre>
</div>
<form id="form-GETapi-app-360-philantrophy" data-method="GET" data-path="api/app/360/philantrophy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-philantrophy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-philantrophy" onclick="tryItOut('GETapi-app-360-philantrophy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-philantrophy" onclick="cancelTryOut('GETapi-app-360-philantrophy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-philantrophy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/philantrophy</code></b>
</p>
</form>


## api/app/360/income




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/income" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/income"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-income" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-income"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-income"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-income" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-income"></code></pre>
</div>
<form id="form-GETapi-app-360-income" data-method="GET" data-path="api/app/360/income" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-income', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-income" onclick="tryItOut('GETapi-app-360-income');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-income" onclick="cancelTryOut('GETapi-app-360-income');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-income" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/income</code></b>
</p>
</form>


## api/app/360/retirement




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/retirement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/retirement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-retirement" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-retirement"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-retirement"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-retirement" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-retirement"></code></pre>
</div>
<form id="form-GETapi-app-360-retirement" data-method="GET" data-path="api/app/360/retirement" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-retirement', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-retirement" onclick="tryItOut('GETapi-app-360-retirement');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-retirement" onclick="cancelTryOut('GETapi-app-360-retirement');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-retirement" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/retirement</code></b>
</p>
</form>


## api/app/360/retirement/roi




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/retirement/roi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/retirement/roi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-retirement-roi" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-retirement-roi"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-retirement-roi"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-retirement-roi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-retirement-roi"></code></pre>
</div>
<form id="form-GETapi-app-360-retirement-roi" data-method="GET" data-path="api/app/360/retirement/roi" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-retirement-roi', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-retirement-roi" onclick="tryItOut('GETapi-app-360-retirement-roi');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-retirement-roi" onclick="cancelTryOut('GETapi-app-360-retirement-roi');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-retirement-roi" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/retirement/roi</code></b>
</p>
</form>


## api/app/360/investment




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/360/investment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/investment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-360-investment" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-360-investment"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-360-investment"></code></pre>
</div>
<div id="execution-error-GETapi-app-360-investment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-360-investment"></code></pre>
</div>
<form id="form-GETapi-app-360-investment" data-method="GET" data-path="api/app/360/investment" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-360-investment', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-360-investment" onclick="tryItOut('GETapi-app-360-investment');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-360-investment" onclick="cancelTryOut('GETapi-app-360-investment');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-360-investment" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/360/investment</code></b>
</p>
</form>


## api/app/360/ilab




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/ilab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/ilab"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-ilab" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-ilab"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-ilab"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-ilab" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-ilab"></code></pre>
</div>
<form id="form-POSTapi-app-360-ilab" data-method="POST" data-path="api/app/360/ilab" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-ilab', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-ilab" onclick="tryItOut('POSTapi-app-360-ilab');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-ilab" onclick="cancelTryOut('POSTapi-app-360-ilab');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-ilab" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/ilab</code></b>
</p>
</form>


## api/app/360/net




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/net" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/net"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-net" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-net"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-net"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-net" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-net"></code></pre>
</div>
<form id="form-POSTapi-app-360-net" data-method="POST" data-path="api/app/360/net" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-net', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-net" onclick="tryItOut('POSTapi-app-360-net');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-net" onclick="cancelTryOut('POSTapi-app-360-net');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-net" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/net</code></b>
</p>
</form>


## api/app/360/cash




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/cash" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/cash"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-cash" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-cash"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-cash"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-cash" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-cash"></code></pre>
</div>
<form id="form-POSTapi-app-360-cash" data-method="POST" data-path="api/app/360/cash" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-cash', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-cash" onclick="tryItOut('POSTapi-app-360-cash');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-cash" onclick="cancelTryOut('POSTapi-app-360-cash');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-cash" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/cash</code></b>
</p>
</form>


## api/app/360/liability




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/liability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/liability"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-liability" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-liability"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-liability"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-liability" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-liability"></code></pre>
</div>
<form id="form-POSTapi-app-360-liability" data-method="POST" data-path="api/app/360/liability" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-liability', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-liability" onclick="tryItOut('POSTapi-app-360-liability');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-liability" onclick="cancelTryOut('POSTapi-app-360-liability');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-liability" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/liability</code></b>
</p>
</form>


## api/app/360/mortgage




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/mortgage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/mortgage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-mortgage" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-mortgage"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-mortgage"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-mortgage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-mortgage"></code></pre>
</div>
<form id="form-POSTapi-app-360-mortgage" data-method="POST" data-path="api/app/360/mortgage" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-mortgage', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-mortgage" onclick="tryItOut('POSTapi-app-360-mortgage');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-mortgage" onclick="cancelTryOut('POSTapi-app-360-mortgage');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-mortgage" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/mortgage</code></b>
</p>
</form>


## api/app/360/equity




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/equity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/equity"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-equity" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-equity"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-equity"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-equity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-equity"></code></pre>
</div>
<form id="form-POSTapi-app-360-equity" data-method="POST" data-path="api/app/360/equity" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-equity', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-equity" onclick="tryItOut('POSTapi-app-360-equity');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-equity" onclick="cancelTryOut('POSTapi-app-360-equity');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-equity" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/equity</code></b>
</p>
</form>


## api/app/360/philantrophy




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/philantrophy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/philantrophy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-philantrophy" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-philantrophy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-philantrophy"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-philantrophy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-philantrophy"></code></pre>
</div>
<form id="form-POSTapi-app-360-philantrophy" data-method="POST" data-path="api/app/360/philantrophy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-philantrophy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-philantrophy" onclick="tryItOut('POSTapi-app-360-philantrophy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-philantrophy" onclick="cancelTryOut('POSTapi-app-360-philantrophy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-philantrophy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/philantrophy</code></b>
</p>
</form>


## api/app/360/income




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/income" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/income"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-income" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-income"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-income"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-income" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-income"></code></pre>
</div>
<form id="form-POSTapi-app-360-income" data-method="POST" data-path="api/app/360/income" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-income', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-income" onclick="tryItOut('POSTapi-app-360-income');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-income" onclick="cancelTryOut('POSTapi-app-360-income');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-income" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/income</code></b>
</p>
</form>


## api/app/360/protection




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/protection" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/protection"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-protection" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-protection"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-protection"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-protection" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-protection"></code></pre>
</div>
<form id="form-POSTapi-app-360-protection" data-method="POST" data-path="api/app/360/protection" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-protection', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-protection" onclick="tryItOut('POSTapi-app-360-protection');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-protection" onclick="cancelTryOut('POSTapi-app-360-protection');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-protection" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/protection</code></b>
</p>
</form>


## api/app/360/retirement




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/retirement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/retirement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-retirement" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-retirement"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-retirement"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-retirement" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-retirement"></code></pre>
</div>
<form id="form-POSTapi-app-360-retirement" data-method="POST" data-path="api/app/360/retirement" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-retirement', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-retirement" onclick="tryItOut('POSTapi-app-360-retirement');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-retirement" onclick="cancelTryOut('POSTapi-app-360-retirement');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-retirement" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/retirement</code></b>
</p>
</form>


## api/app/360/improve/roi




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/improve/roi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/improve/roi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-improve-roi" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-improve-roi"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-improve-roi"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-improve-roi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-improve-roi"></code></pre>
</div>
<form id="form-POSTapi-app-360-improve-roi" data-method="POST" data-path="api/app/360/improve/roi" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-improve-roi', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-improve-roi" onclick="tryItOut('POSTapi-app-360-improve-roi');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-improve-roi" onclick="cancelTryOut('POSTapi-app-360-improve-roi');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-improve-roi" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/improve/roi</code></b>
</p>
</form>


## api/app/360/liability/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/liability/deleniti" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/liability/deleniti"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-liability--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-liability--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-liability--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-liability--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-liability--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-liability--id-" data-method="POST" data-path="api/app/360/liability/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-liability--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-liability--id-" onclick="tryItOut('POSTapi-app-360-liability--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-liability--id-" onclick="cancelTryOut('POSTapi-app-360-liability--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-liability--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/liability/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-liability--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/mortgage/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/mortgage/dolor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/mortgage/dolor"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-mortgage--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-mortgage--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-mortgage--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-mortgage--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-mortgage--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-mortgage--id-" data-method="POST" data-path="api/app/360/mortgage/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-mortgage--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-mortgage--id-" onclick="tryItOut('POSTapi-app-360-mortgage--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-mortgage--id-" onclick="cancelTryOut('POSTapi-app-360-mortgage--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-mortgage--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/mortgage/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-mortgage--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/cash/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/cash/cum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/cash/cum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-cash--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-cash--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-cash--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-cash--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-cash--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-cash--id-" data-method="POST" data-path="api/app/360/cash/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-cash--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-cash--id-" onclick="tryItOut('POSTapi-app-360-cash--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-cash--id-" onclick="cancelTryOut('POSTapi-app-360-cash--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-cash--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/cash/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-cash--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/retirement/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/retirement/temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/retirement/temporibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-retirement--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-retirement--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-retirement--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-retirement--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-retirement--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-retirement--id-" data-method="POST" data-path="api/app/360/retirement/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-retirement--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-retirement--id-" onclick="tryItOut('POSTapi-app-360-retirement--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-retirement--id-" onclick="cancelTryOut('POSTapi-app-360-retirement--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-retirement--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/retirement/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-retirement--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/equity/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/equity/tempora" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/equity/tempora"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-equity--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-equity--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-equity--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-equity--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-equity--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-equity--id-" data-method="POST" data-path="api/app/360/equity/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-equity--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-equity--id-" onclick="tryItOut('POSTapi-app-360-equity--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-equity--id-" onclick="cancelTryOut('POSTapi-app-360-equity--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-equity--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/equity/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-equity--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/protection/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/protection/unde" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/protection/unde"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-protection--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-protection--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-protection--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-protection--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-protection--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-protection--id-" data-method="POST" data-path="api/app/360/protection/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-protection--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-protection--id-" onclick="tryItOut('POSTapi-app-360-protection--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-protection--id-" onclick="cancelTryOut('POSTapi-app-360-protection--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-protection--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/protection/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-protection--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/360/income/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/income/in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/income/in"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-income--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-income--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-income--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-income--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-income--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-income--id-" data-method="POST" data-path="api/app/360/income/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-income--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-income--id-" onclick="tryItOut('POSTapi-app-360-income--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-income--id-" onclick="cancelTryOut('POSTapi-app-360-income--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-income--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/income/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-income--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update Non Asset Porrtfolio Income


Update Non Portfolio Period

> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/360/income/records/assumenda" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/360/income/records/assumenda"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-360-income-records--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-360-income-records--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-360-income-records--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-360-income-records--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-360-income-records--id-"></code></pre>
</div>
<form id="form-POSTapi-app-360-income-records--id-" data-method="POST" data-path="api/app/360/income/records/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-360-income-records--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-360-income-records--id-" onclick="tryItOut('POSTapi-app-360-income-records--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-360-income-records--id-" onclick="cancelTryOut('POSTapi-app-360-income-records--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-360-income-records--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/360/income/records/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-360-income-records--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/portfolio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-portfolio" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-portfolio"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-portfolio"></code></pre>
</div>
<div id="execution-error-GETapi-app-portfolio" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-portfolio"></code></pre>
</div>
<form id="form-GETapi-app-portfolio" data-method="GET" data-path="api/app/portfolio" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-portfolio', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-portfolio" onclick="tryItOut('GETapi-app-portfolio');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-portfolio" onclick="cancelTryOut('GETapi-app-portfolio');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-portfolio" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/portfolio</code></b>
</p>
</form>


## api/app/portfolio/information




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/portfolio/information" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/information"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-portfolio-information" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-portfolio-information"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-portfolio-information"></code></pre>
</div>
<div id="execution-error-GETapi-app-portfolio-information" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-portfolio-information"></code></pre>
</div>
<form id="form-GETapi-app-portfolio-information" data-method="GET" data-path="api/app/portfolio/information" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-portfolio-information', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-portfolio-information" onclick="tryItOut('GETapi-app-portfolio-information');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-portfolio-information" onclick="cancelTryOut('GETapi-app-portfolio-information');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-portfolio-information" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/portfolio/information</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/portfolio/asset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/asset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-portfolio-asset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-portfolio-asset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-portfolio-asset"></code></pre>
</div>
<div id="execution-error-POSTapi-app-portfolio-asset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-portfolio-asset"></code></pre>
</div>
<form id="form-POSTapi-app-portfolio-asset" data-method="POST" data-path="api/app/portfolio/asset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-portfolio-asset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-portfolio-asset" onclick="tryItOut('POSTapi-app-portfolio-asset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-portfolio-asset" onclick="cancelTryOut('POSTapi-app-portfolio-asset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-portfolio-asset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/portfolio/asset</code></b>
</p>
</form>


## api/app/portfolio/{braid}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/portfolio/nobis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/nobis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-portfolio--braid-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-portfolio--braid-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-portfolio--braid-"></code></pre>
</div>
<div id="execution-error-GETapi-app-portfolio--braid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-portfolio--braid-"></code></pre>
</div>
<form id="form-GETapi-app-portfolio--braid-" data-method="GET" data-path="api/app/portfolio/{braid}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-portfolio--braid-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-portfolio--braid-" onclick="tryItOut('GETapi-app-portfolio--braid-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-portfolio--braid-" onclick="cancelTryOut('GETapi-app-portfolio--braid-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-portfolio--braid-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/portfolio/{braid}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="GETapi-app-portfolio--braid-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/portfolio/{braid}/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/app/portfolio/quia/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/quia/rerum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-app-portfolio--braid---id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-app-portfolio--braid---id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-app-portfolio--braid---id-"></code></pre>
</div>
<div id="execution-error-GETapi-app-portfolio--braid---id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-app-portfolio--braid---id-"></code></pre>
</div>
<form id="form-GETapi-app-portfolio--braid---id-" data-method="GET" data-path="api/app/portfolio/{braid}/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-app-portfolio--braid---id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-app-portfolio--braid---id-" onclick="tryItOut('GETapi-app-portfolio--braid---id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-app-portfolio--braid---id-" onclick="cancelTryOut('GETapi-app-portfolio--braid---id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-app-portfolio--braid---id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/app/portfolio/{braid}/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="GETapi-app-portfolio--braid---id-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-app-portfolio--braid---id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/portfolio/update/note/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/portfolio/update/note/harum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/update/note/harum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-portfolio-update-note--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-portfolio-update-note--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-portfolio-update-note--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-portfolio-update-note--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-portfolio-update-note--id-"></code></pre>
</div>
<form id="form-POSTapi-app-portfolio-update-note--id-" data-method="POST" data-path="api/app/portfolio/update/note/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-portfolio-update-note--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-portfolio-update-note--id-" onclick="tryItOut('POSTapi-app-portfolio-update-note--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-portfolio-update-note--id-" onclick="cancelTryOut('POSTapi-app-portfolio-update-note--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-portfolio-update-note--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/portfolio/update/note/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-portfolio-update-note--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/portfolio/update/photo/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/portfolio/update/photo/odit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/update/photo/odit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-portfolio-update-photo--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-portfolio-update-photo--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-portfolio-update-photo--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-portfolio-update-photo--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-portfolio-update-photo--id-"></code></pre>
</div>
<form id="form-POSTapi-app-portfolio-update-photo--id-" data-method="POST" data-path="api/app/portfolio/update/photo/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-portfolio-update-photo--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-portfolio-update-photo--id-" onclick="tryItOut('POSTapi-app-portfolio-update-photo--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-portfolio-update-photo--id-" onclick="cancelTryOut('POSTapi-app-portfolio-update-photo--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-portfolio-update-photo--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/portfolio/update/photo/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-portfolio-update-photo--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/portfolio/update/details/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/portfolio/update/details/quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/update/details/quo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-portfolio-update-details--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-portfolio-update-details--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-portfolio-update-details--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-portfolio-update-details--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-portfolio-update-details--id-"></code></pre>
</div>
<form id="form-POSTapi-app-portfolio-update-details--id-" data-method="POST" data-path="api/app/portfolio/update/details/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-portfolio-update-details--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-portfolio-update-details--id-" onclick="tryItOut('POSTapi-app-portfolio-update-details--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-portfolio-update-details--id-" onclick="cancelTryOut('POSTapi-app-portfolio-update-details--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-portfolio-update-details--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/portfolio/update/details/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-portfolio-update-details--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/portfolio/update/records/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/portfolio/update/records/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/portfolio/update/records/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-portfolio-update-records--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-portfolio-update-records--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-portfolio-update-records--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-app-portfolio-update-records--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-portfolio-update-records--id-"></code></pre>
</div>
<form id="form-POSTapi-app-portfolio-update-records--id-" data-method="POST" data-path="api/app/portfolio/update/records/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-portfolio-update-records--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-portfolio-update-records--id-" onclick="tryItOut('POSTapi-app-portfolio-update-records--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-portfolio-update-records--id-" onclick="cancelTryOut('POSTapi-app-portfolio-update-records--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-portfolio-update-records--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/portfolio/update/records/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-app-portfolio-update-records--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## api/app/feedback




> Example request:

```bash
curl -X POST \
    "http://localhost/api/app/feedback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/app/feedback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-app-feedback" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-app-feedback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-app-feedback"></code></pre>
</div>
<div id="execution-error-POSTapi-app-feedback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-app-feedback"></code></pre>
</div>
<form id="form-POSTapi-app-feedback" data-method="POST" data-path="api/app/feedback" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-app-feedback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-app-feedback" onclick="tryItOut('POSTapi-app-feedback');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-app-feedback" onclick="cancelTryOut('POSTapi-app-feedback');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-app-feedback" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/app/feedback</code></b>
</p>
</form>


## api/mygap/logout




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mygap/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-mygap-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mygap-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mygap-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-mygap-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mygap-logout"></code></pre>
</div>
<form id="form-POSTapi-mygap-logout" data-method="POST" data-path="api/mygap/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mygap-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mygap-logout" onclick="tryItOut('POSTapi-mygap-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mygap-logout" onclick="cancelTryOut('POSTapi-mygap-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mygap-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mygap/logout</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/mygap/security" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/security"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-mygap-security" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mygap-security"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mygap-security"></code></pre>
</div>
<div id="execution-error-GETapi-mygap-security" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mygap-security"></code></pre>
</div>
<form id="form-GETapi-mygap-security" data-method="GET" data-path="api/mygap/security" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mygap-security', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-mygap-security" onclick="tryItOut('GETapi-mygap-security');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-mygap-security" onclick="cancelTryOut('GETapi-mygap-security');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-mygap-security" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mygap/security</code></b>
</p>
</form>


## api/mygap/update/password




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mygap/update/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/update/password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-mygap-update-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mygap-update-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mygap-update-password"></code></pre>
</div>
<div id="execution-error-POSTapi-mygap-update-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mygap-update-password"></code></pre>
</div>
<form id="form-POSTapi-mygap-update-password" data-method="POST" data-path="api/mygap/update/password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mygap-update-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mygap-update-password" onclick="tryItOut('POSTapi-mygap-update-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mygap-update-password" onclick="cancelTryOut('POSTapi-mygap-update-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mygap-update-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mygap/update/password</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/api/mygap/securemobile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/mygap/securemobile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-mygap-securemobile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mygap-securemobile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mygap-securemobile"></code></pre>
</div>
<div id="execution-error-POSTapi-mygap-securemobile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mygap-securemobile"></code></pre>
</div>
<form id="form-POSTapi-mygap-securemobile" data-method="POST" data-path="api/mygap/securemobile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mygap-securemobile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mygap-securemobile" onclick="tryItOut('POSTapi-mygap-securemobile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mygap-securemobile" onclick="cancelTryOut('POSTapi-mygap-securemobile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mygap-securemobile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mygap/securemobile</code></b>
</p>
</form>


## api/confirm/passcode




> Example request:

```bash
curl -X POST \
    "http://localhost/api/confirm/passcode" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/confirm/passcode"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-confirm-passcode" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-confirm-passcode"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-confirm-passcode"></code></pre>
</div>
<div id="execution-error-POSTapi-confirm-passcode" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-confirm-passcode"></code></pre>
</div>
<form id="form-POSTapi-confirm-passcode" data-method="POST" data-path="api/confirm/passcode" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-confirm-passcode', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-confirm-passcode" onclick="tryItOut('POSTapi-confirm-passcode');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-confirm-passcode" onclick="cancelTryOut('POSTapi-confirm-passcode');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-confirm-passcode" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/confirm/passcode</code></b>
</p>
</form>


## /




> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/login'" />

        <title>Redirecting to http://localhost/login</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/login">http://localhost/login</a>.
    </body>
</html>
```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>


## install




> Example request:

```bash
curl -X GET \
    -G "http://localhost/install" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/install"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<h1>Cache facade value cleared</h1>
```
<div id="execution-results-GETinstall" hidden>
    <blockquote>Received response<span id="execution-response-status-GETinstall"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETinstall"></code></pre>
</div>
<div id="execution-error-GETinstall" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETinstall"></code></pre>
</div>
<form id="form-GETinstall" data-method="GET" data-path="install" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETinstall', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETinstall" onclick="tryItOut('GETinstall');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETinstall" onclick="cancelTryOut('GETinstall');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETinstall" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>install</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/fincalculator" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/fincalculator"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
              <div class="wd-f cal-head">
    <div class="overlay">
        <div class="head-pain">
            <div class="mb-4">
                <h4 class="">This is where the Experience</h4>    
                <h4 class=" txt-primary">Begins!</h4>
            </div>
            <p class="">
                Being financially independent is your ability to sustain your livelihood or lifestyle without relying on income from employment or self-employment (e.g. wages from jobs).    
            </p>    
        </div>
    </div>
</div>            <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
                <div class="container-fluid">
        <div class="gap-card pb-0">
            <div class="gap-card-header">
                <div class="gap-card-title txt-primary text-center">Financial Independence Calculator                </div>
            </div>
            <span class="">
                <span id="costError" class="d-block my-2 pl-4 text-danger wd-8"></span>
            </span>
            <form method="POST" id="calc-form"  action="http://localhost/fincalculator">
                <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
                <div id="accordion">
                    <div class="card">
                        <div class="accord-header" id="headingOne">
                          <div class="wd-f">
                              <span class="gap-card-title accord-title">Monthly Budget</span>
                              <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-chevron-down"></i>
                              </button> 
                          </div>
                        </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body pb-1">
                            <div class="form-sheet">
                              <div class="sheet-intro">
                                <p>To calculate your Financial Independence status, compute your monthly budget and provide
                                  figures for your savings & portfolio income.</p>
                              </div>
                              <ul class="lists">
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">Choose your prefered currency</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <select name="currency" id="currency" value="" onchange="chooseCurrency()" class="form-control" id="">
                                                                                                                                  <option value="$ USD">$ USD</option>
                                                                                                                                                                              <option value="€ EUR">€ EUR</option>
                                                                                                                                                                              <option value="£ GBP">£ GBP</option>
                                                                                                                                                                              <option value="₦ NGN">₦ NGN</option>
                                                                                                                                                                              <option value="A$ AUD">A$ AUD</option>
                                                                                                                                                                              <option value="¥ JPY">¥ JPY</option>
                                                                                                                                                                              <option value="¢ GHS">¢ GHS</option>
                                                                                                                                                                              <option value="CF CHF">CF CHF</option>
                                                                                                                                                                              <option value="C$ CAD">C$ CAD</option>
                                                                                                                                                                              <option value="元 CNY">元 CNY</option>
                                                                                                                                                                              <option value="$ MXN">$ MXN</option>
                                                                                                                                                                              <option value="₹ INR">₹ INR</option>
                                                                                                                                                                              <option value="₽ RUB">₽ RUB</option>
                                                                                                                                                                              <option value="R$ BRL">R$ BRL</option>
                                                                                                                                                                              <option value="R ZAR">R ZAR</option>
                                                                                                                                                                              <option value="د.إ AED">د.إ AED</option>
                                                                                                                                                                              <option value="﷼ SAR">﷼ SAR</option>
                                                                                                                                                                              <option value="Rp IDR">Rp IDR</option>
                                                                                                                          </select>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much do you set aside for savings?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="periodic_savings" id="periodic_savings" required>
                                      <span class="min-total" id="periodic_savings_total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much do you spend on your personal development (e.g. Seminars, training, courses, books, e.t.c.)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="education" id="education" required>
                                      <span class="min-total" id="education_total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly rent or mortgage?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="mortgage" id="mortgage" required>
                                      <span class="min-total" id="mortgage-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">What is your total mobility cost (incl. Car insurance, MOT, fuel e.t.c)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="mobility" id="mobility" required>
                                      <span class="min-total" id="mobility-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly home expenses (incl. groceries, clothes, insurances etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="expenses" id="expenses" required>
                                      <span class="min-total" id="expenses-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much is your monthly utility costs
                                      (incl. council tax, energy, tv, mobile etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="utility" id="utility" required>
                                      <span class="min-total" id="utility-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">What is your monthly debt repayment cost (incl. credit cards, loan, hire purchase etc)?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="dept_pay" id="dept_pay" required>
                                      <span class="min-total col-total" id="col-total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="row mx-0 bg-white">
                                  <div class="col-md-8">
                                    <label for="">How much do you spend on giving to others including charity?</label>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="price-wrap">
                                      <label for="" class="price-currency"></label>
                                      <input type="number" step="any"  onblur="calcTotalExpenses()" oninput="calcTotalExpenses()" onfocus="focalPoint(this)" value="0" min="0" class="" name="charity" id="charity" required>
                                      <span class="min-total" id="charity_total">Total 0</span>
                                    </div> 
                                  </div>
                                </li>
                                <li class="details">
                                  <div class="detail-left">
                                    <h4 class="detail-title">Total Monthly Budget:</h4>
                                    <span class="detail-subtitle">This is the TARGET income for your Asset Portfolio income</span>
                                  </div>
                                  <div class="detail-right">
                                    <div class="simp-box">
                                      
                                      <h4 class="col-total py-1" id="col-total2">0</h4>
                                    </div>
                                  </div>
                                </li>
                                <li class="see-result mt-3">
                                  <button id="next" disabled class="btn btn-pry px-3" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" 
                                  aria-controls="collapseTwo">Continue</button>
                                </li>
                              </ul>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="accord-header last" id="headingOne">
                        <div class="wd-f">
                            <span class="gap-card-title accord-title">Savings and Portfolio Income</span>
                            <button class="btn btn-accord" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fa fa-chevron-down"></i>
                            </button> 
                        </div>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body pb-1">
                          <div class="form-sheet tp-n1">
                            <ul class="lists">
                              <li class="row mx-0 bg-white">
                                <div class="col-md-8">
                                  <label for="">How much monthly income do you earn from sources (assets) other than your wages?</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="price-wrap">
                                    <label for="" class="price-currency"></label>
                                    <input type="number" step="any" value="0" onfocus="focalPoint(this)"  min="0" class="" name="income" id="income" required>
                                  </div> 
                                </div>  
                              </li>
                              <li class="row mx-0 bg-white">
                                <div class="col-md-8">
                                  <label for="">How much do you have in savings for rainy day?</label>
                                </div>
                                <div class="col-md-4">
                                  <div class="price-wrap">
                                    <label for="" class="price-currency"></label>
                                    <input type="number" step="any" value="0" onfocus="focalPoint(this)"  min="0" class="" name="extra" id="extra" required>
                                  </div> 
                                </div>
                              </li> 
                              <li class="see-result mt-3">
                                <button class="btn btn-pry px-3" type="submit"> See Result </button>
                              </li>
                            </ul> 
                            <p class="text-center">
                              <span class="smaller">Result will be displayed in both Time & Percentage</span>
                            </p>
                        </div>
                      </div>
                    </div>
                </div>
            </form>
        </div> 
    </div>
<script>
// var 

function calcTotalExpenses(){
    let currency = document.getElementById('currency').value;
    if(currency) currency = currency.split(' ');
    // Properties
    let mobility_total = document.getElementById('mobility-total'),
        mortgage_total = document.getElementById('mortgage-total'),
        utility_total = document.getElementById('utility-total'),
        expenses_total = document.getElementById('expenses-total'),
        periodic_total = document.getElementById('periodic_savings_total'),
        education_total = document.getElementById('education_total'),
        charity_total = document.getElementById('charity_total'),
        col_total = document.getElementById('col-total'),
        col_total2 = document.getElementById('col-total2');

    // Values
    let expenses = document.getElementById('expenses').value,
        mortgage = document.getElementById('mortgage').value,
        mobility = document.getElementById('mobility').value,
        utility = document.getElementById('utility').value,
        dept_pay = document.getElementById('dept_pay').value,
        periodic_savings = document.getElementById('periodic_savings').value,
        education = document.getElementById('education').value,
        charity = document.getElementById('charity').value;

    // Error
    let costError = document.getElementById('costError'),
        next = document.getElementById('next');

    if(total > 10){
      next.disabled = false;
    }else{ 
      next.disabled = true;
    }

    if( expenses === "" || mortgage === '' ||  mobility === '' || utility === '' || dept_pay === ''){
      costError.textContent = 'All fields are required';
      next.disabled = true;
    }else{
      next.disabled = false;
      costError.textContent = '';
    }

    var total = +periodic_savings + +education + +expenses + +mortgage + +mobility + +utility 
                    + +dept_pay + +charity,
        edutotal = +periodic_savings + +education, 
        mortotal = +periodic_savings + +education + +mortgage, 
        mobtotal = +periodic_savings + +education + +mortgage + +mobility, 
        exptotal = +periodic_savings + +education + +mortgage + +mobility + +expenses,
        utitotal = +periodic_savings + +education + +mortgage + +mobility + +expenses + +utility;
    var depttotal = utitotal + +dept_pay; 
    var chitotal = depttotal + +charity; 
    
    periodic_total.textContent = 'Total '+ currency[0] + periodic_savings; 
    education_total.textContent = 'Total '+ currency[0] + edutotal; 
    mortgage_total.textContent = 'Total '+ currency[0] + mortotal; 
    mobility_total.textContent = 'Total '+ currency[0] + mobtotal;
    expenses_total.textContent = 'Total '+ currency[0] + exptotal;
    utility_total.textContent = 'Total '+ currency[0] + utitotal;
    col_total.textContent = 'Total '+ currency[0] +depttotal;
    charity_total.textContent = 'Total '+ currency[0] + chitotal;
    col_total2.textContent = currency[0]+ total;
} 

function calcTotalSavings(){ 
    let totalsavings = document.getElementById('total-savings'),
        extra = document.getElementById('extra').value,
        income = document.getElementById('income').value; 

    let total = +extra + +income;
    totalsavings.textContent =  currency+total;   
}

function chooseCurrency(){
   let currency = document.getElementById('currency').value,
       prices = document.getElementsByClassName('price-currency');
   if (currency) {
      let cur = currency.split(' ');
      for (let i = 0; i < prices.length; i++) {
        prices[i].innerHTML = cur[0];
      } 
   }
   calcTotalExpenses();
}

chooseCurrency();
</script>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETfincalculator" hidden>
    <blockquote>Received response<span id="execution-response-status-GETfincalculator"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETfincalculator"></code></pre>
</div>
<div id="execution-error-GETfincalculator" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETfincalculator"></code></pre>
</div>
<form id="form-GETfincalculator" data-method="GET" data-path="fincalculator" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETfincalculator', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETfincalculator" onclick="tryItOut('GETfincalculator');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETfincalculator" onclick="cancelTryOut('GETfincalculator');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETfincalculator" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>fincalculator</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/fincalculator" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/fincalculator"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTfincalculator" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTfincalculator"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTfincalculator"></code></pre>
</div>
<div id="execution-error-POSTfincalculator" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTfincalculator"></code></pre>
</div>
<form id="form-POSTfincalculator" data-method="POST" data-path="fincalculator" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTfincalculator', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTfincalculator" onclick="tryItOut('POSTfincalculator');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTfincalculator" onclick="cancelTryOut('POSTfincalculator');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTfincalculator" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>fincalculator</code></b>
</p>
</form>


## fin/improve




> Example request:

```bash
curl -X POST \
    "http://localhost/fin/improve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/fin/improve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTfin-improve" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTfin-improve"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTfin-improve"></code></pre>
</div>
<div id="execution-error-POSTfin-improve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTfin-improve"></code></pre>
</div>
<form id="form-POSTfin-improve" data-method="POST" data-path="fin/improve" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTfin-improve', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTfin-improve" onclick="tryItOut('POSTfin-improve');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTfin-improve" onclick="cancelTryOut('POSTfin-improve');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTfin-improve" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>fin/improve</code></b>
</p>
</form>


## fin/download




> Example request:

```bash
curl -X POST \
    "http://localhost/fin/download" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/fin/download"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTfin-download" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTfin-download"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTfin-download"></code></pre>
</div>
<div id="execution-error-POSTfin-download" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTfin-download"></code></pre>
</div>
<form id="form-POSTfin-download" data-method="POST" data-path="fin/download" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTfin-download', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTfin-download" onclick="tryItOut('POSTfin-download');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTfin-download" onclick="cancelTryOut('POSTfin-download');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTfin-download" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>fin/download</code></b>
</p>
</form>


## status/recommend




> Example request:

```bash
curl -X POST \
    "http://localhost/status/recommend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/status/recommend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTstatus-recommend" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTstatus-recommend"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTstatus-recommend"></code></pre>
</div>
<div id="execution-error-POSTstatus-recommend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTstatus-recommend"></code></pre>
</div>
<form id="form-POSTstatus-recommend" data-method="POST" data-path="status/recommend" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTstatus-recommend', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTstatus-recommend" onclick="tryItOut('POSTstatus-recommend');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTstatus-recommend" onclick="cancelTryOut('POSTstatus-recommend');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTstatus-recommend" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>status/recommend</code></b>
</p>
</form>


## status/recommend




> Example request:

```bash
curl -X GET \
    -G "http://localhost/status/recommend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/status/recommend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (422):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "roce": [
            "The roce field is required."
        ],
        "invest": [
            "The invest field is required."
        ]
    }
}
```
<div id="execution-results-GETstatus-recommend" hidden>
    <blockquote>Received response<span id="execution-response-status-GETstatus-recommend"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETstatus-recommend"></code></pre>
</div>
<div id="execution-error-GETstatus-recommend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatus-recommend"></code></pre>
</div>
<form id="form-GETstatus-recommend" data-method="GET" data-path="status/recommend" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETstatus-recommend', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETstatus-recommend" onclick="tryItOut('GETstatus-recommend');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETstatus-recommend" onclick="cancelTryOut('GETstatus-recommend');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETstatus-recommend" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>status/recommend</code></b>
</p>
</form>


## fin/improve




> Example request:

```bash
curl -X GET \
    -G "http://localhost/fin/improve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/fin/improve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
              <div class="wd-f cal-head">
    <div class="overlay">
        <div class="head-pain">
            <div class="mb-4">
                <h4 class="">This is where the Experience</h4>    
                <h4 class=" txt-primary">Begins!</h4>
            </div>
            <p class="">
                Being financially independent is your ability to sustain your livelihood or lifestyle without relying on income from employment or self-employment (e.g. wages from jobs).    
            </p>    
        </div>
    </div>
</div>            <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
                <div class="">
        <div class="wd-f  py-5">
            <div class="gap-center"> 
                <h3 class="text-center mb-1 bold">Improve your status</h3>
                <div class="wd-f py-1">
                    <form method="POST" id="calc-form"  action="http://localhost/status/recommend">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
                        <div class="form-sheet sheet-plain">
                            <ul class="lists">
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="">Monthly Asset Portfolio Income (APi) needed</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap">
                                        <input type="text" disabled value=" " class="" name="cost" id="cost" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="">Your current monthly asset portfolio income</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap">
                                            <input type="text" disabled value="" class="" name="income" id="income" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8"> 
                                        <label for="">How much can you set aside monthly for investments?</label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap"> 
                                            <label for="" class="price-currency"> </label>
                                            <input type="number" step="any" onfocus="focalPoint(this)"  value="0" min="1" class="" name="invest" id="invest" required>
                                        </div> 
                                    </div>
                                </li>
                                <li class="row mx-0">
                                    <div class="col-md-8">
                                        <label for="" style="width: 110%">What is your expected Return on Capital Employed (ROCE)?  
                                            <span class="info"   data-toggle="tooltip" data-placement="left"  title="To help you achieve the monthly financial target, you will need to consider investments with adequate returns. 
                                            Choose a desired return on capital employed. 
                                            (Typical conventional rate of return, is between 3% to 10%).
                                            "><i class="fa fa-info mx-2" style="font-size: 11px;"></i></span>
                                            
                                            
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="price-wrap percentage">
                                            <input type="number" step="any" value="0" min="2"  onfocus="focalPoint(this)" max="100" class="percent" name="roce" id="roce" required>
                                            <span class="txt-percent">%</span>
                                        </div>  
                                    </div>
                                </li>
                                <div class="see-result mt-4" style="background: none;">
                                    <button class="btn btn-pry px-3" type="submit"> See Result </button>
                                </div>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         
    </div>
    <script>
        function getROCE(){
            // fetch('')
            // MAIL_USERNAME=dev.support@infoscertcom
            // MAIL_PASSWORD="qs&@cdq1P.$E"
        }
    </script>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETfin-improve" hidden>
    <blockquote>Received response<span id="execution-response-status-GETfin-improve"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETfin-improve"></code></pre>
</div>
<div id="execution-error-GETfin-improve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETfin-improve"></code></pre>
</div>
<form id="form-GETfin-improve" data-method="GET" data-path="fin/improve" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETfin-improve', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETfin-improve" onclick="tryItOut('GETfin-improve');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETfin-improve" onclick="cancelTryOut('GETfin-improve');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETfin-improve" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>fin/improve</code></b>
</p>
</form>


## Resend the email verification notification.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Call to a member function hasVerifiedEmail() on null",
    "exception": "Error",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\ui\\auth-backend\\VerifiesEmails.php",
    "line": 83,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "resend",
            "class": "App\\Http\\Controllers\\Auth\\VerificationController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 261,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 204,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 63,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETemail-resend" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-resend"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-resend"></code></pre>
</div>
<div id="execution-error-GETemail-resend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-resend"></code></pre>
</div>
<form id="form-GETemail-resend" data-method="GET" data-path="email/resend" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-resend', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-resend" onclick="tryItOut('GETemail-resend');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-resend" onclick="cancelTryOut('GETemail-resend');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-resend" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/resend</code></b>
</p>
</form>


## Show the email verification notice.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/email/verify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Call to a member function hasVerifiedEmail() on null",
    "exception": "Error",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\ui\\auth-backend\\VerifiesEmails.php",
    "line": 22,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "show",
            "class": "App\\Http\\Controllers\\Auth\\VerificationController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 261,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 204,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETemail-verify" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-verify"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-verify"></code></pre>
</div>
<div id="execution-error-GETemail-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-verify"></code></pre>
</div>
<form id="form-GETemail-verify" data-method="GET" data-path="email/verify" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-verify', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-verify" onclick="tryItOut('GETemail-verify');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-verify" onclick="cancelTryOut('GETemail-verify');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-verify" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/verify</code></b>
</p>
</form>


## email/reminder




> Example request:

```bash
curl -X GET \
    -G "http://localhost/email/reminder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/email/reminder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/register'" />

        <title>Redirecting to http://localhost/register</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/register">http://localhost/register</a>.
    </body>
</html>
```
<div id="execution-results-GETemail-reminder" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-reminder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-reminder"></code></pre>
</div>
<div id="execution-error-GETemail-reminder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-reminder"></code></pre>
</div>
<form id="form-GETemail-reminder" data-method="GET" data-path="email/reminder" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-reminder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-reminder" onclick="tryItOut('GETemail-reminder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-reminder" onclick="cancelTryOut('GETemail-reminder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-reminder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/reminder</code></b>
</p>
</form>


## Show the application&#039;s login form.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
                        <p id="msg" class="alert alert-danger">
        Your account is not found
    </p>
<script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
            <div class="wd-f log-overlay hg-f">
    <div class="py-4">
        <div class="gap-center-sm">
            <div class="form-log form-reg card">
                <div class="gap-header mb-3">
                    <h3 class="mx-1"><b>Login</b></h3>
                    <span class="line-step" style="width: 10%"></span>
                    
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="http://localhost/login">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q"> 
                        <div class="form-group">
                            
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div class="">
                                <input id="password" placeholder="Password" type="password" min="6" class="form-control" name="password" required>

                                                            </div>
                        </div>

                        

                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block-sm btn-pry">Login </button>
                                
                            </div>
                        </div>
                        
                        <div class="form-group text-center">
                                                            <a class="btn btn-link" href="http://localhost/password/reset">
                                    Forgot Your Password?
                                </a>
                                                    </div>
                        <div class="form-group mt-4">
                            <div class="text-center">
                                <div class="mb-1">Don't have an account yet?</div>
                                 <a class="card-link text-white" href="http://localhost/register">
                                    <button type="button" class="btn btn-rounded btn-block btn-primary" >
                                        Sign Up Now!
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETlogin" onclick="tryItOut('GETlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETlogin" onclick="cancelTryOut('GETlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>login</code></b>
</p>
</form>


## login




> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogin" onclick="tryItOut('POSTlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogin" onclick="cancelTryOut('POSTlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>login</code></b>
</p>
</form>


## logout




> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"></code></pre>
</div>
<div id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout"></code></pre>
</div>
<form id="form-POSTlogout" data-method="POST" data-path="logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogout" onclick="tryItOut('POSTlogout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogout" onclick="cancelTryOut('POSTlogout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>logout</code></b>
</p>
</form>


## register




> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
                        <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
            <div class="">
    <div class="wd-f hg-f py-4 bg-white">
        <div class="gap-center-sm bg-light card">
            <div class="gap-header form-reg">
                <h3 class="mt-2 bold mx-2"><b>Registration</b></h3>
                <span class="line-step" style="width: 25%"></span>
                
            </div>  
            <div class="gap-bosy"> 
                <div class="card-body">
                    <form class="form-reg" id="registration_form" method="POST" action="http://localhost/register">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
                        <div class="form-group ">
                            

                            <div class="">
                                <input id="email" type="email" placeholder="Email:" class="form-control " name="email" value="" required>

                                                            </div>  
                        </div>
 
                        <div class="form-group ">
                            

                            <div class="">
                                <input id="email_confirmation" placeholder="Confirm Email:"  type="email" class="form-control " name="email_confirmation" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div class="">
                                <input id="firstname" placeholder="Firstname:" type="text" class="form-control " name="firstname" value="" required autofocus>

                                                            </div>
                        </div>
                    
                        <div class="form-group ">
                            

                            <div class="">
                                <input id="surname" type="text" placeholder="Surname:" class="form-control " name="surname" value="" required autofocus>

                                                            </div>
                        </div>
                        
                        

                        <div class="form-group ">
                            

                            <div class="">
                                <input id="password" placeholder="Password:" type="password" class="form-control " name="password" required>

                                                                <div class="passwordStrength ml-2  pr-4 text-danger">Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.</div>
                            </div>
                        </div>

                        <div class="form-group ">
                            

                            <div class="">
                                <input id="password-confirm" placeholder="Retype Password:" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group my-3 text-center bold">
                            <label for=""> 
                                <input type="checkbox" name="policy" required id="" class="mr-3 bs-none form-check-input check-register" >
                                <span class="mr-2">I accept the <a href="http://www.mygaphub.com/index.php/terms-conditions/" target="_blank" class="txt-primary">Terms & Conditions </a> and <a href="http://www.mygaphub.com/index.php/privacy-policy/" target="_blank" class="txt-primary">Privacy Policy</a></span> 
                            </label>
                        </div>
                        <div class="form-group  mb-0"> 
                            <div class=" text-right mt-1">
                                <button type="submit" class="btn px-2 btn-pry "> Create Account </button>
                                <span class="ml-2 bold">
                                    Already have an account? <a href="http://localhost/login" class="txt-primary">Log in here </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        let passwordVal = document.getElementById('password'),
            form = document.getElementById('registration_form');

        function valPassword(){
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            //   !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~ let pattern = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let numPattern =  new RegExp("(?=.*[0-9])"),
                lowerPattern =  new RegExp("(?=.*[a-z])"),
                upperPattern =  new RegExp("(?=.*[A-Z])"),
                // nonCharPattern =  /[^A-Za-z 0-9]/g;
                nonCharPattern =   new RegExp("[^A-Za-z 0-9]");
                specialPattern =  new RegExp("^(?=.*[!@#\$%\^&\*\-\:])");


            let passwordVal = document.getElementById('password'),
                valide = document.getElementsByClassName('passwordStrength')[0];
           
            if(passwordVal.value.length == 0 || !passwordVal.value){
                valide.innerHTML = 'Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.';
            }else if(!lowerPattern.test(passwordVal.value)){
                valide.innerHTML = 'One lowercase letter is required';
            }else if(!upperPattern.test(passwordVal.value)){
                valide.innerHTML = 'One uppercase letter is required'; 
            }else if(!numPattern.test(passwordVal.value)){
                valide.innerHTML = 'One number is required';
            }else if(!nonCharPattern.test(passwordVal.value)){ 
                valide.innerHTML = 'One special character is required';
            }else if(passwordVal.value.length < 8){
                valide.innerHTML = 'Minimum of 8 characters is required';
            }else{
                valide.innerHTML = '';
                return true;
            }
            return false;
        }
        passwordVal.addEventListener('input',  ()=>{valPassword()} );
        form.addEventListener('submit', (e)=> {
            e.preventDefault();
            if(valPassword()){
                form.submit();
            }
            return valPassword();
        });
        
    });

</script>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETregister" hidden>
    <blockquote>Received response<span id="execution-response-status-GETregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"></code></pre>
</div>
<div id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister"></code></pre>
</div>
<form id="form-GETregister" data-method="GET" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETregister" onclick="tryItOut('GETregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETregister" onclick="cancelTryOut('GETregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>register</code></b>
</p>
</form>


## Handle a registration request for the application.




> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"></code></pre>
</div>
<div id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister"></code></pre>
</div>
<form id="form-POSTregister" data-method="POST" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTregister" onclick="tryItOut('POSTregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTregister" onclick="cancelTryOut('POSTregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>register</code></b>
</p>
</form>


## Display the form to request a password reset link.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
                        <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
            <div class="wd-f log-overlay hg-f">
    <div class="py-4">
        <div class="gap-center-sm">
            <div class="form-log form-reg card">
                <div class="gap-header mb-3">
                    <h3 class="mx-1"><b>Reset Password</b></h3>
                    <span class="line-step" style="width: 30%"></span>
                    
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="http://localhost/password/email">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">                         

                        <div class="form-group">
                            
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block btn-pry">   Send Password Reset Link </button>           
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset"></code></pre>
</div>
<div id="execution-error-GETpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset"></code></pre>
</div>
<form id="form-GETpassword-reset" data-method="GET" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset" onclick="tryItOut('GETpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset" onclick="cancelTryOut('GETpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset</code></b>
</p>
</form>


## Send a reset link to the given user.




> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-email"></code></pre>
</div>
<div id="execution-error-POSTpassword-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-email"></code></pre>
</div>
<form id="form-POSTpassword-email" data-method="POST" data-path="password/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-email" onclick="tryItOut('POSTpassword-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-email" onclick="cancelTryOut('POSTpassword-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/email</code></b>
</p>
</form>


## Display the password reset view for the given token.


If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/reiciendis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/reiciendis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles -->  
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/script.js"></script>
</head> 
<body>
    <div id="app">
        <nav id="gapnav" class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://mygaphub.com">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://mygaphub.com">Home</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/gap-budgeting/">Budgeting</a>
                    </li>
                    
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/acquisition/">Acquisition</a>
                    </li>
                    <li class="nav-item menu-nav"> 
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/analytics/">Analytics</a>
                    </li>
                    <li class="nav-item menu-nav">
                        <a class="nav-link" href="https://www.mygaphub.com/index.php/personal-finance-360-degree/">360<sup>o</sup></a>
                    </li> 
                    <li class="nav-item menu-nav">
                        <div class="dropdown" onmouseover="showDrop()" onmouseout="removeDrop()">
                            <a class="nav-link"  href="#" style="color: #222;" role="button" id="dropdownMenuLink" data-toggle="dropdown" >
                               More
                            </a>

                            <div class="dropdown-menu" id="gapDropdown" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="http://localhost/register">Sign Up</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/masonry/">Blog</a>
                                <a class="dropdown-item" href="https://www.mygaphub.com/index.php/contact-us/">Contact Us</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item menu-nav access">
                        <a class="nav-link" href="http://localhost/login">Get Access</a>
                    </li>
                    
                    
                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("gapnav");
    var sticky = navbar.offsetTop;
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
    function showDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.add('show');
    }
    function removeDrop(){
        var dropdown = document.getElementById('gapDropdown');
        dropdown.classList.remove('show');
    }
    // function sticky() {
    //     if (window.pageYOffset >= sticky) {
    //         navbar.classList.add("sticky")
    //     } else { 
    //         navbar.classList.remove("sticky");
    //     }
    // }
   

</script>

        <main class="content">
                        <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
            <div class="wd-f log-overlay hg-f">
    <div class="py-4">
        <div class="gap-center-sm">
            <div class="form-log form-reg card"> 
                <div class="gap-header mb-3">
                    <h3 class="mx-1"><b>Reset Password</b></h3>
                    <span class="line-step" style="width: 30%"></span>
                    
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" id="reset_form" action="http://localhost/password/reset">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">
                        <input type="hidden" name="token" value="reiciendis">
                        
                         
                        <div class="form-group">
                            
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            
                            <div class="">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                                                <div class="passwordStrength ml-2  pr-4 text-danger">Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.</div>
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>

                                                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">  Reset Password </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        let passwordVal = document.getElementById('password'),
            form = document.getElementById('reset_form');

        function valPassword(){
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            //   !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~ let pattern = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$"); //Regex: At least 8 characters with at least 2 numericals
            let numPattern =  new RegExp("(?=.*[0-9])"),
                lowerPattern =  new RegExp("(?=.*[a-z])"),
                upperPattern =  new RegExp("(?=.*[A-Z])"),
                // nonCharPattern =  /[^A-Za-z 0-9]/g;
                nonCharPattern =   new RegExp("[^A-Za-z 0-9]");
                specialPattern =  new RegExp("^(?=.*[!@#\$%\^&\*\-\:])");


            let passwordVal = document.getElementById('password'),
                valide = document.getElementsByClassName('passwordStrength')[0];
           
            if(passwordVal.value.length == 0){
                valide.innerHTML = 'Your password should have a mixture of numbers, letters (uppercase and lowercase) with a special character.';
            }else if(!lowerPattern.test(passwordVal.value)){
                valide.innerHTML = 'One lowercase letter is required';
            }else if(!upperPattern.test(passwordVal.value)){
                valide.innerHTML = 'One uppercase letter is required'; 
            }else if(!numPattern.test(passwordVal.value)){
                valide.innerHTML = 'One number is required';
            }else if(!nonCharPattern.test(passwordVal.value)){ 
                valide.innerHTML = 'One special character is required';
            }else if(passwordVal.value.length < 8){
                valide.innerHTML = 'Minimum of 8 characters is required';
            }else{
                valide.innerHTML = '';
                return true;
            }
            return false;
        }
        passwordVal.addEventListener('input',  ()=>{valPassword()} );
        form.addEventListener('submit', (e)=> {
            e.preventDefault();
            if(valPassword()){
                form.submit();
            }
            return valPassword();
        });
        
    });

</script>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js" ></script>
        
</body>
</html> 
```
<div id="execution-results-GETpassword-reset--token-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETpassword-reset--token-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETpassword-reset--token-"></code></pre>
</div>
<div id="execution-error-GETpassword-reset--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpassword-reset--token-"></code></pre>
</div>
<form id="form-GETpassword-reset--token-" data-method="GET" data-path="password/reset/{token}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETpassword-reset--token-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETpassword-reset--token-" onclick="tryItOut('GETpassword-reset--token-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETpassword-reset--token-" onclick="cancelTryOut('GETpassword-reset--token-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETpassword-reset--token-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>password/reset/{token}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="GETpassword-reset--token-" data-component="url" required  hidden>
<br>

</p>
</form>


## Reset the given user&#039;s password.




> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTpassword-reset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTpassword-reset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTpassword-reset"></code></pre>
</div>
<div id="execution-error-POSTpassword-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTpassword-reset"></code></pre>
</div>
<form id="form-POSTpassword-reset" data-method="POST" data-path="password/reset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTpassword-reset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTpassword-reset" onclick="tryItOut('POSTpassword-reset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTpassword-reset" onclick="cancelTryOut('POSTpassword-reset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTpassword-reset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>password/reset</code></b>
</p>
</form>


## email/verify/{id}/{hash}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/email/verify/facilis/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/email/verify/facilis/quia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (403):

```json
{
    "message": "Invalid signature.",
    "exception": "Illuminate\\Routing\\Exceptions\\InvalidSignatureException",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ValidateSignature.php",
    "line": 26,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ValidateSignature",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 127,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\ThrottleRequests.php",
            "line": 63,
            "function": "handleRequest",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\ThrottleRequests",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETemail-verify--id---hash-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-verify--id---hash-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-verify--id---hash-"></code></pre>
</div>
<div id="execution-error-GETemail-verify--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-verify--id---hash-"></code></pre>
</div>
<form id="form-GETemail-verify--id---hash-" data-method="GET" data-path="email/verify/{id}/{hash}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-verify--id---hash-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-verify--id---hash-" onclick="tryItOut('GETemail-verify--id---hash-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-verify--id---hash-" onclick="cancelTryOut('GETemail-verify--id---hash-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-verify--id---hash-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/verify/{id}/{hash}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hash" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>

</p>
</form>


## Resend the email verification notification.




> Example request:

```bash
curl -X POST \
    "http://localhost/email/resend" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/email/resend"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTemail-resend" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTemail-resend"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTemail-resend"></code></pre>
</div>
<div id="execution-error-POSTemail-resend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTemail-resend"></code></pre>
</div>
<form id="form-POSTemail-resend" data-method="POST" data-path="email/resend" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTemail-resend', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTemail-resend" onclick="tryItOut('POSTemail-resend');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTemail-resend" onclick="cancelTryOut('POSTemail-resend');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTemail-resend" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>email/resend</code></b>
</p>
</form>


## questions




> Example request:

```bash
curl -X POST \
    "http://localhost/questions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/questions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTquestions" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTquestions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTquestions"></code></pre>
</div>
<div id="execution-error-POSTquestions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTquestions"></code></pre>
</div>
<form id="form-POSTquestions" data-method="POST" data-path="questions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTquestions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTquestions" onclick="tryItOut('POSTquestions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTquestions" onclick="cancelTryOut('POSTquestions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTquestions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>questions</code></b>
</p>
</form>


## actionplan




> Example request:

```bash
curl -X GET \
    -G "http://localhost/actionplan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actionplan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETactionplan" hidden>
    <blockquote>Received response<span id="execution-response-status-GETactionplan"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETactionplan"></code></pre>
</div>
<div id="execution-error-GETactionplan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETactionplan"></code></pre>
</div>
<form id="form-GETactionplan" data-method="GET" data-path="actionplan" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETactionplan', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETactionplan" onclick="tryItOut('GETactionplan');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETactionplan" onclick="cancelTryOut('GETactionplan');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETactionplan" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>actionplan</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/actionplan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/actionplan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTactionplan" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTactionplan"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTactionplan"></code></pre>
</div>
<div id="execution-error-POSTactionplan" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTactionplan"></code></pre>
</div>
<form id="form-POSTactionplan" data-method="POST" data-path="actionplan" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTactionplan', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTactionplan" onclick="tryItOut('POSTactionplan');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTactionplan" onclick="cancelTryOut('POSTactionplan');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTactionplan" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>actionplan</code></b>
</p>
</form>


## acquisition/favourite/{asset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/favourite/a" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/favourite/a"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETacquisition-favourite--asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-favourite--asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-favourite--asset-"></code></pre>
</div>
<div id="execution-error-GETacquisition-favourite--asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-favourite--asset-"></code></pre>
</div>
<form id="form-GETacquisition-favourite--asset-" data-method="GET" data-path="acquisition/favourite/{asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-favourite--asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-favourite--asset-" onclick="tryItOut('GETacquisition-favourite--asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-favourite--asset-" onclick="cancelTryOut('GETacquisition-favourite--asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-favourite--asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/favourite/{asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-favourite--asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/create/alert




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/create/alert" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/create/alert"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETacquisition-create-alert" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-create-alert"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-create-alert"></code></pre>
</div>
<div id="execution-error-GETacquisition-create-alert" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-create-alert"></code></pre>
</div>
<form id="form-GETacquisition-create-alert" data-method="GET" data-path="acquisition/create/alert" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-create-alert', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-create-alert" onclick="tryItOut('GETacquisition-create-alert');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-create-alert" onclick="cancelTryOut('GETacquisition-create-alert');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-create-alert" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/create/alert</code></b>
</p>
</form>


## acquisition/invest/reap/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/acquisition/invest/reap/aperiam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/invest/reap/aperiam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTacquisition-invest-reap--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTacquisition-invest-reap--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTacquisition-invest-reap--sasset-"></code></pre>
</div>
<div id="execution-error-POSTacquisition-invest-reap--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacquisition-invest-reap--sasset-"></code></pre>
</div>
<form id="form-POSTacquisition-invest-reap--sasset-" data-method="POST" data-path="acquisition/invest/reap/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTacquisition-invest-reap--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTacquisition-invest-reap--sasset-" onclick="tryItOut('POSTacquisition-invest-reap--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTacquisition-invest-reap--sasset-" onclick="cancelTryOut('POSTacquisition-invest-reap--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTacquisition-invest-reap--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>acquisition/invest/reap/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTacquisition-invest-reap--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/invest/ganp/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/acquisition/invest/ganp/accusantium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/invest/ganp/accusantium"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTacquisition-invest-ganp--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTacquisition-invest-ganp--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTacquisition-invest-ganp--sasset-"></code></pre>
</div>
<div id="execution-error-POSTacquisition-invest-ganp--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacquisition-invest-ganp--sasset-"></code></pre>
</div>
<form id="form-POSTacquisition-invest-ganp--sasset-" data-method="POST" data-path="acquisition/invest/ganp/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTacquisition-invest-ganp--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTacquisition-invest-ganp--sasset-" onclick="tryItOut('POSTacquisition-invest-ganp--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTacquisition-invest-ganp--sasset-" onclick="cancelTryOut('POSTacquisition-invest-ganp--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTacquisition-invest-ganp--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>acquisition/invest/ganp/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTacquisition-invest-ganp--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## Show the application dashboard.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome"></code></pre>
</div>
<div id="execution-error-GEThome" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome"></code></pre>
</div>
<form id="form-GEThome" data-method="GET" data-path="home" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome" onclick="tryItOut('GEThome');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome" onclick="cancelTryOut('GEThome');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home</code></b>
</p>
</form>


## home/notifications




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-notifications" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-notifications"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-notifications"></code></pre>
</div>
<div id="execution-error-GEThome-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-notifications"></code></pre>
</div>
<form id="form-GEThome-notifications" data-method="GET" data-path="home/notifications" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-notifications', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-notifications" onclick="tryItOut('GEThome-notifications');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-notifications" onclick="cancelTryOut('GEThome-notifications');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-notifications" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/notifications</code></b>
</p>
</form>


## home/dashboard/tiles




> Example request:

```bash
curl -X POST \
    "http://localhost/home/dashboard/tiles" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/dashboard/tiles"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-dashboard-tiles" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-dashboard-tiles"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-dashboard-tiles"></code></pre>
</div>
<div id="execution-error-POSThome-dashboard-tiles" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-dashboard-tiles"></code></pre>
</div>
<form id="form-POSThome-dashboard-tiles" data-method="POST" data-path="home/dashboard/tiles" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-dashboard-tiles', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-dashboard-tiles" onclick="tryItOut('POSThome-dashboard-tiles');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-dashboard-tiles" onclick="cancelTryOut('POSThome-dashboard-tiles');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-dashboard-tiles" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/dashboard/tiles</code></b>
</p>
</form>


## home/seed




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/seed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/seed"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-seed" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-seed"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-seed"></code></pre>
</div>
<div id="execution-error-GEThome-seed" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-seed"></code></pre>
</div>
<form id="form-GEThome-seed" data-method="GET" data-path="home/seed" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-seed', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-seed" onclick="tryItOut('GEThome-seed');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-seed" onclick="cancelTryOut('GEThome-seed');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-seed" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/seed</code></b>
</p>
</form>


## home/seed/store




> Example request:

```bash
curl -X POST \
    "http://localhost/home/seed/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/seed/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-seed-store" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-seed-store"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-seed-store"></code></pre>
</div>
<div id="execution-error-POSThome-seed-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-seed-store"></code></pre>
</div>
<form id="form-POSThome-seed-store" data-method="POST" data-path="home/seed/store" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-seed-store', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-seed-store" onclick="tryItOut('POSThome-seed-store');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-seed-store" onclick="cancelTryOut('POSThome-seed-store');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-seed-store" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/seed/store</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/7g" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/7g"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-7g" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-7g"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-7g"></code></pre>
</div>
<div id="execution-error-GEThome-7g" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-7g"></code></pre>
</div>
<form id="form-GEThome-7g" data-method="GET" data-path="home/7g" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-7g', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-7g" onclick="tryItOut('GEThome-7g');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-7g" onclick="cancelTryOut('GEThome-7g');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-7g" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/7g</code></b>
</p>
</form>


## home/7g/edit




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/7g/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/7g/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-7g-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-7g-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-7g-edit"></code></pre>
</div>
<div id="execution-error-GEThome-7g-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-7g-edit"></code></pre>
</div>
<form id="form-GEThome-7g-edit" data-method="GET" data-path="home/7g/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-7g-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-7g-edit" onclick="tryItOut('GEThome-7g-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-7g-edit" onclick="cancelTryOut('GEThome-7g-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-7g-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/7g/edit</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/home/7g/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/7g/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-7g-store" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-7g-store"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-7g-store"></code></pre>
</div>
<div id="execution-error-POSThome-7g-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-7g-store"></code></pre>
</div>
<form id="form-POSThome-7g-store" data-method="POST" data-path="home/7g/store" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-7g-store', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-7g-store" onclick="tryItOut('POSThome-7g-store');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-7g-store" onclick="cancelTryOut('POSThome-7g-store');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-7g-store" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/7g/store</code></b>
</p>
</form>


## home/7g/bespoke




> Example request:

```bash
curl -X POST \
    "http://localhost/home/7g/bespoke" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/7g/bespoke"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-7g-bespoke" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-7g-bespoke"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-7g-bespoke"></code></pre>
</div>
<div id="execution-error-POSThome-7g-bespoke" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-7g-bespoke"></code></pre>
</div>
<form id="form-POSThome-7g-bespoke" data-method="POST" data-path="home/7g/bespoke" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-7g-bespoke', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-7g-bespoke" onclick="tryItOut('POSThome-7g-bespoke');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-7g-bespoke" onclick="cancelTryOut('POSThome-7g-bespoke');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-7g-bespoke" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/7g/bespoke</code></b>
</p>
</form>


## home/7g/bespoke/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/7g/bespoke/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/7g/bespoke/rerum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-7g-bespoke--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-7g-bespoke--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-7g-bespoke--id-"></code></pre>
</div>
<div id="execution-error-POSThome-7g-bespoke--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-7g-bespoke--id-"></code></pre>
</div>
<form id="form-POSThome-7g-bespoke--id-" data-method="POST" data-path="home/7g/bespoke/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-7g-bespoke--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-7g-bespoke--id-" onclick="tryItOut('POSThome-7g-bespoke--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-7g-bespoke--id-" onclick="cancelTryOut('POSThome-7g-bespoke--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-7g-bespoke--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/7g/bespoke/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-7g-bespoke--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/bespoke/edit




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/bespoke/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/bespoke/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-bespoke-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-bespoke-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-bespoke-edit"></code></pre>
</div>
<div id="execution-error-GEThome-bespoke-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-bespoke-edit"></code></pre>
</div>
<form id="form-GEThome-bespoke-edit" data-method="GET" data-path="home/bespoke/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-bespoke-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-bespoke-edit" onclick="tryItOut('GEThome-bespoke-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-bespoke-edit" onclick="cancelTryOut('GEThome-bespoke-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-bespoke-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/bespoke/edit</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/reminder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-reminder" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-reminder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-reminder"></code></pre>
</div>
<div id="execution-error-GEThome-reminder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-reminder"></code></pre>
</div>
<form id="form-GEThome-reminder" data-method="GET" data-path="home/reminder" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-reminder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-reminder" onclick="tryItOut('GEThome-reminder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-reminder" onclick="cancelTryOut('GEThome-reminder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-reminder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/reminder</code></b>
</p>
</form>


## Show the form for creating a new resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/reminder/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-reminder-create" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-reminder-create"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-reminder-create"></code></pre>
</div>
<div id="execution-error-GEThome-reminder-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-reminder-create"></code></pre>
</div>
<form id="form-GEThome-reminder-create" data-method="GET" data-path="home/reminder/create" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-reminder-create', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-reminder-create" onclick="tryItOut('GEThome-reminder-create');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-reminder-create" onclick="cancelTryOut('GEThome-reminder-create');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-reminder-create" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/reminder/create</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/home/reminder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-reminder" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-reminder"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-reminder"></code></pre>
</div>
<div id="execution-error-POSThome-reminder" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-reminder"></code></pre>
</div>
<form id="form-POSThome-reminder" data-method="POST" data-path="home/reminder" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-reminder', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-reminder" onclick="tryItOut('POSThome-reminder');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-reminder" onclick="cancelTryOut('POSThome-reminder');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-reminder" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/reminder</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/reminder/dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder/dolores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-GEThome-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-reminder--reminder-"></code></pre>
</div>
<form id="form-GEThome-reminder--reminder-" data-method="GET" data-path="home/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-reminder--reminder-" onclick="tryItOut('GEThome-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-reminder--reminder-" onclick="cancelTryOut('GEThome-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="GEThome-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Show the form for editing the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/reminder/iste/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder/iste/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-reminder--reminder--edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-reminder--reminder--edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-reminder--reminder--edit"></code></pre>
</div>
<div id="execution-error-GEThome-reminder--reminder--edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-reminder--reminder--edit"></code></pre>
</div>
<form id="form-GEThome-reminder--reminder--edit" data-method="GET" data-path="home/reminder/{reminder}/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-reminder--reminder--edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-reminder--reminder--edit" onclick="tryItOut('GEThome-reminder--reminder--edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-reminder--reminder--edit" onclick="cancelTryOut('GEThome-reminder--reminder--edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-reminder--reminder--edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/reminder/{reminder}/edit</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="GEThome-reminder--reminder--edit" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X PUT \
    "http://localhost/home/reminder/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUThome-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUThome-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUThome-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-PUThome-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUThome-reminder--reminder-"></code></pre>
</div>
<form id="form-PUThome-reminder--reminder-" data-method="PUT" data-path="home/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUThome-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUThome-reminder--reminder-" onclick="tryItOut('PUThome-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUThome-reminder--reminder-" onclick="cancelTryOut('PUThome-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUThome-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>home/reminder/{reminder}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>home/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="PUThome-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Remove the specified resource from storage.




> Example request:

```bash
curl -X DELETE \
    "http://localhost/home/reminder/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/reminder/qui"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEhome-reminder--reminder-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEhome-reminder--reminder-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEhome-reminder--reminder-"></code></pre>
</div>
<div id="execution-error-DELETEhome-reminder--reminder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEhome-reminder--reminder-"></code></pre>
</div>
<form id="form-DELETEhome-reminder--reminder-" data-method="DELETE" data-path="home/reminder/{reminder}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEhome-reminder--reminder-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEhome-reminder--reminder-" onclick="tryItOut('DELETEhome-reminder--reminder-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEhome-reminder--reminder-" onclick="cancelTryOut('DELETEhome-reminder--reminder-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEhome-reminder--reminder-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>home/reminder/{reminder}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>reminder</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="reminder" data-endpoint="DELETEhome-reminder--reminder-" data-component="url" required  hidden>
<br>

</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools"></code></pre>
</div>
<div id="execution-error-GEThome-tools" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools"></code></pre>
</div>
<form id="form-GEThome-tools" data-method="GET" data-path="home/tools" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools" onclick="tryItOut('GEThome-tools');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools" onclick="cancelTryOut('GEThome-tools');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools</code></b>
</p>
</form>


## home/tools/profile




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools-profile"></code></pre>
</div>
<div id="execution-error-GEThome-tools-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools-profile"></code></pre>
</div>
<form id="form-GEThome-tools-profile" data-method="GET" data-path="home/tools/profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools-profile" onclick="tryItOut('GEThome-tools-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools-profile" onclick="cancelTryOut('GEThome-tools-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools/profile</code></b>
</p>
</form>


## home/tools/security




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools/security" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/security"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools-security" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools-security"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools-security"></code></pre>
</div>
<div id="execution-error-GEThome-tools-security" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools-security"></code></pre>
</div>
<form id="form-GEThome-tools-security" data-method="GET" data-path="home/tools/security" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools-security', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools-security" onclick="tryItOut('GEThome-tools-security');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools-security" onclick="cancelTryOut('GEThome-tools-security');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools-security" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools/security</code></b>
</p>
</form>


## home/tools/compliance




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools/compliance" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/compliance"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools-compliance" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools-compliance"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools-compliance"></code></pre>
</div>
<div id="execution-error-GEThome-tools-compliance" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools-compliance"></code></pre>
</div>
<form id="form-GEThome-tools-compliance" data-method="GET" data-path="home/tools/compliance" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools-compliance', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools-compliance" onclick="tryItOut('GEThome-tools-compliance');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools-compliance" onclick="cancelTryOut('GEThome-tools-compliance');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools-compliance" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools/compliance</code></b>
</p>
</form>


## home/tools/preference




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools/preference" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/preference"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools-preference" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools-preference"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools-preference"></code></pre>
</div>
<div id="execution-error-GEThome-tools-preference" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools-preference"></code></pre>
</div>
<form id="form-GEThome-tools-preference" data-method="GET" data-path="home/tools/preference" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools-preference', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools-preference" onclick="tryItOut('GEThome-tools-preference');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools-preference" onclick="cancelTryOut('GEThome-tools-preference');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools-preference" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools/preference</code></b>
</p>
</form>


## home/tools/exchange




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/tools/exchange" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/exchange"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-tools-exchange" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-tools-exchange"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-tools-exchange"></code></pre>
</div>
<div id="execution-error-GEThome-tools-exchange" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-tools-exchange"></code></pre>
</div>
<form id="form-GEThome-tools-exchange" data-method="GET" data-path="home/tools/exchange" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-tools-exchange', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-tools-exchange" onclick="tryItOut('GEThome-tools-exchange');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-tools-exchange" onclick="cancelTryOut('GEThome-tools-exchange');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-tools-exchange" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/tools/exchange</code></b>
</p>
</form>


## home/tools/preference/exchange




> Example request:

```bash
curl -X POST \
    "http://localhost/home/tools/preference/exchange" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/preference/exchange"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-tools-preference-exchange" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-tools-preference-exchange"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-tools-preference-exchange"></code></pre>
</div>
<div id="execution-error-POSThome-tools-preference-exchange" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-tools-preference-exchange"></code></pre>
</div>
<form id="form-POSThome-tools-preference-exchange" data-method="POST" data-path="home/tools/preference/exchange" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-tools-preference-exchange', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-tools-preference-exchange" onclick="tryItOut('POSThome-tools-preference-exchange');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-tools-preference-exchange" onclick="cancelTryOut('POSThome-tools-preference-exchange');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-tools-preference-exchange" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/tools/preference/exchange</code></b>
</p>
</form>


## home/tools/picture




> Example request:

```bash
curl -X POST \
    "http://localhost/home/tools/picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-tools-picture" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-tools-picture"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-tools-picture"></code></pre>
</div>
<div id="execution-error-POSThome-tools-picture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-tools-picture"></code></pre>
</div>
<form id="form-POSThome-tools-picture" data-method="POST" data-path="home/tools/picture" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-tools-picture', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-tools-picture" onclick="tryItOut('POSThome-tools-picture');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-tools-picture" onclick="cancelTryOut('POSThome-tools-picture');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-tools-picture" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/tools/picture</code></b>
</p>
</form>


## home/tools/default/picture




> Example request:

```bash
curl -X POST \
    "http://localhost/home/tools/default/picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/default/picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-tools-default-picture" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-tools-default-picture"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-tools-default-picture"></code></pre>
</div>
<div id="execution-error-POSThome-tools-default-picture" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-tools-default-picture"></code></pre>
</div>
<form id="form-POSThome-tools-default-picture" data-method="POST" data-path="home/tools/default/picture" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-tools-default-picture', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-tools-default-picture" onclick="tryItOut('POSThome-tools-default-picture');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-tools-default-picture" onclick="cancelTryOut('POSThome-tools-default-picture');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-tools-default-picture" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/tools/default/picture</code></b>
</p>
</form>


## home/tools/editprofile




> Example request:

```bash
curl -X POST \
    "http://localhost/home/tools/editprofile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/editprofile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-tools-editprofile" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-tools-editprofile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-tools-editprofile"></code></pre>
</div>
<div id="execution-error-POSThome-tools-editprofile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-tools-editprofile"></code></pre>
</div>
<form id="form-POSThome-tools-editprofile" data-method="POST" data-path="home/tools/editprofile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-tools-editprofile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-tools-editprofile" onclick="tryItOut('POSThome-tools-editprofile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-tools-editprofile" onclick="cancelTryOut('POSThome-tools-editprofile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-tools-editprofile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/tools/editprofile</code></b>
</p>
</form>


## home/tools/security/password




> Example request:

```bash
curl -X POST \
    "http://localhost/home/tools/security/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/tools/security/password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-tools-security-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-tools-security-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-tools-security-password"></code></pre>
</div>
<div id="execution-error-POSThome-tools-security-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-tools-security-password"></code></pre>
</div>
<form id="form-POSThome-tools-security-password" data-method="POST" data-path="home/tools/security/password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-tools-security-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-tools-security-password" onclick="tryItOut('POSThome-tools-security-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-tools-security-password" onclick="cancelTryOut('POSThome-tools-security-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-tools-security-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/tools/security/password</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360"></code></pre>
</div>
<div id="execution-error-GEThome-360" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360"></code></pre>
</div>
<form id="form-GEThome-360" data-method="GET" data-path="home/360" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360" onclick="tryItOut('GEThome-360');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360" onclick="cancelTryOut('GEThome-360');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360</code></b>
</p>
</form>


## home/360/ilab




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/ilab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/ilab"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-ilab" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-ilab"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-ilab"></code></pre>
</div>
<div id="execution-error-GEThome-360-ilab" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-ilab"></code></pre>
</div>
<form id="form-GEThome-360-ilab" data-method="GET" data-path="home/360/ilab" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-ilab', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-ilab" onclick="tryItOut('GEThome-360-ilab');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-ilab" onclick="cancelTryOut('GEThome-360-ilab');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-ilab" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/ilab</code></b>
</p>
</form>


## home/360/net




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/net" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/net"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-net" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-net"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-net"></code></pre>
</div>
<div id="execution-error-GEThome-360-net" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-net"></code></pre>
</div>
<form id="form-GEThome-360-net" data-method="GET" data-path="home/360/net" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-net', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-net" onclick="tryItOut('GEThome-360-net');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-net" onclick="cancelTryOut('GEThome-360-net');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-net" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/net</code></b>
</p>
</form>


## home/360/liability




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/liability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/liability"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-liability" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-liability"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-liability"></code></pre>
</div>
<div id="execution-error-GEThome-360-liability" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-liability"></code></pre>
</div>
<form id="form-GEThome-360-liability" data-method="GET" data-path="home/360/liability" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-liability', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-liability" onclick="tryItOut('GEThome-360-liability');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-liability" onclick="cancelTryOut('GEThome-360-liability');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-liability" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/liability</code></b>
</p>
</form>


## home/360/liabilities




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/liabilities" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/liabilities"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-liabilities" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-liabilities"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-liabilities"></code></pre>
</div>
<div id="execution-error-GEThome-360-liabilities" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-liabilities"></code></pre>
</div>
<form id="form-GEThome-360-liabilities" data-method="GET" data-path="home/360/liabilities" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-liabilities', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-liabilities" onclick="tryItOut('GEThome-360-liabilities');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-liabilities" onclick="cancelTryOut('GEThome-360-liabilities');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-liabilities" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/liabilities</code></b>
</p>
</form>


## home/360/expenditure




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/expenditure" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/expenditure"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-expenditure" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-expenditure"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-expenditure"></code></pre>
</div>
<div id="execution-error-GEThome-360-expenditure" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-expenditure"></code></pre>
</div>
<form id="form-GEThome-360-expenditure" data-method="GET" data-path="home/360/expenditure" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-expenditure', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-expenditure" onclick="tryItOut('GEThome-360-expenditure');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-expenditure" onclick="cancelTryOut('GEThome-360-expenditure');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-expenditure" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/expenditure</code></b>
</p>
</form>


## home/360/protection




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/protection" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/protection"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-protection" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-protection"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-protection"></code></pre>
</div>
<div id="execution-error-GEThome-360-protection" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-protection"></code></pre>
</div>
<form id="form-GEThome-360-protection" data-method="GET" data-path="home/360/protection" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-protection', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-protection" onclick="tryItOut('GEThome-360-protection');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-protection" onclick="cancelTryOut('GEThome-360-protection');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-protection" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/protection</code></b>
</p>
</form>


## home/360/retirement




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/retirement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/retirement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-retirement" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-retirement"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-retirement"></code></pre>
</div>
<div id="execution-error-GEThome-360-retirement" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-retirement"></code></pre>
</div>
<form id="form-GEThome-360-retirement" data-method="GET" data-path="home/360/retirement" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-retirement', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-retirement" onclick="tryItOut('GEThome-360-retirement');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-retirement" onclick="cancelTryOut('GEThome-360-retirement');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-retirement" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/retirement</code></b>
</p>
</form>


## home/360/investment




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/investment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/investment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-investment" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-investment"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-investment"></code></pre>
</div>
<div id="execution-error-GEThome-360-investment" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-investment"></code></pre>
</div>
<form id="form-GEThome-360-investment" data-method="GET" data-path="home/360/investment" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-investment', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-investment" onclick="tryItOut('GEThome-360-investment');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-investment" onclick="cancelTryOut('GEThome-360-investment');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-investment" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/investment</code></b>
</p>
</form>


## home/360/cash




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/cash" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/cash"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-cash" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-cash"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-cash"></code></pre>
</div>
<div id="execution-error-GEThome-360-cash" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-cash"></code></pre>
</div>
<form id="form-GEThome-360-cash" data-method="GET" data-path="home/360/cash" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-cash', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-cash" onclick="tryItOut('GEThome-360-cash');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-cash" onclick="cancelTryOut('GEThome-360-cash');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-cash" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/cash</code></b>
</p>
</form>


## home/360/mortgage




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/mortgage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/mortgage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-mortgage" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-mortgage"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-mortgage"></code></pre>
</div>
<div id="execution-error-GEThome-360-mortgage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-mortgage"></code></pre>
</div>
<form id="form-GEThome-360-mortgage" data-method="GET" data-path="home/360/mortgage" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-mortgage', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-mortgage" onclick="tryItOut('GEThome-360-mortgage');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-mortgage" onclick="cancelTryOut('GEThome-360-mortgage');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-mortgage" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/mortgage</code></b>
</p>
</form>


## home/360/philantrophy




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/philantrophy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/philantrophy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-philantrophy" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-philantrophy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-philantrophy"></code></pre>
</div>
<div id="execution-error-GEThome-360-philantrophy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-philantrophy"></code></pre>
</div>
<form id="form-GEThome-360-philantrophy" data-method="GET" data-path="home/360/philantrophy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-philantrophy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-philantrophy" onclick="tryItOut('GEThome-360-philantrophy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-philantrophy" onclick="cancelTryOut('GEThome-360-philantrophy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-philantrophy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/philantrophy</code></b>
</p>
</form>


## home/360/income




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/income" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/income"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-income" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-income"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-income"></code></pre>
</div>
<div id="execution-error-GEThome-360-income" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-income"></code></pre>
</div>
<form id="form-GEThome-360-income" data-method="GET" data-path="home/360/income" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-income', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-income" onclick="tryItOut('GEThome-360-income');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-income" onclick="cancelTryOut('GEThome-360-income');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-income" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/income</code></b>
</p>
</form>


## home/360/list/income




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/list/income" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/list/income"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-list-income" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-list-income"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-list-income"></code></pre>
</div>
<div id="execution-error-GEThome-360-list-income" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-list-income"></code></pre>
</div>
<form id="form-GEThome-360-list-income" data-method="GET" data-path="home/360/list/income" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-list-income', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-list-income" onclick="tryItOut('GEThome-360-list-income');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-list-income" onclick="cancelTryOut('GEThome-360-list-income');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-list-income" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/list/income</code></b>
</p>
</form>


## home/360/asset




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/asset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/asset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-asset" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-asset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-asset"></code></pre>
</div>
<div id="execution-error-GEThome-360-asset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-asset"></code></pre>
</div>
<form id="form-GEThome-360-asset" data-method="GET" data-path="home/360/asset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-asset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-asset" onclick="tryItOut('GEThome-360-asset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-asset" onclick="cancelTryOut('GEThome-360-asset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-asset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/asset</code></b>
</p>
</form>


## home/360/equity




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/360/equity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/equity"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-360-equity" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-360-equity"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-360-equity"></code></pre>
</div>
<div id="execution-error-GEThome-360-equity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-360-equity"></code></pre>
</div>
<form id="form-GEThome-360-equity" data-method="GET" data-path="home/360/equity" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-360-equity', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-360-equity" onclick="tryItOut('GEThome-360-equity');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-360-equity" onclick="cancelTryOut('GEThome-360-equity');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-360-equity" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/360/equity</code></b>
</p>
</form>


## home/360/ilab




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/ilab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/ilab"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-ilab" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-ilab"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-ilab"></code></pre>
</div>
<div id="execution-error-POSThome-360-ilab" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-ilab"></code></pre>
</div>
<form id="form-POSThome-360-ilab" data-method="POST" data-path="home/360/ilab" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-ilab', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-ilab" onclick="tryItOut('POSThome-360-ilab');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-ilab" onclick="cancelTryOut('POSThome-360-ilab');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-ilab" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/ilab</code></b>
</p>
</form>


## home/360/net




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/net" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/net"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-net" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-net"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-net"></code></pre>
</div>
<div id="execution-error-POSThome-360-net" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-net"></code></pre>
</div>
<form id="form-POSThome-360-net" data-method="POST" data-path="home/360/net" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-net', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-net" onclick="tryItOut('POSThome-360-net');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-net" onclick="cancelTryOut('POSThome-360-net');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-net" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/net</code></b>
</p>
</form>


## Cash




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/cash" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/cash"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-cash" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-cash"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-cash"></code></pre>
</div>
<div id="execution-error-POSThome-360-cash" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-cash"></code></pre>
</div>
<form id="form-POSThome-360-cash" data-method="POST" data-path="home/360/cash" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-cash', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-cash" onclick="tryItOut('POSThome-360-cash');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-cash" onclick="cancelTryOut('POSThome-360-cash');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-cash" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/cash</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/liability" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/liability"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-liability" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-liability"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-liability"></code></pre>
</div>
<div id="execution-error-POSThome-360-liability" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-liability"></code></pre>
</div>
<form id="form-POSThome-360-liability" data-method="POST" data-path="home/360/liability" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-liability', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-liability" onclick="tryItOut('POSThome-360-liability');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-liability" onclick="cancelTryOut('POSThome-360-liability');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-liability" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/liability</code></b>
</p>
</form>


## home/360/mortgage




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/mortgage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/mortgage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-mortgage" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-mortgage"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-mortgage"></code></pre>
</div>
<div id="execution-error-POSThome-360-mortgage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-mortgage"></code></pre>
</div>
<form id="form-POSThome-360-mortgage" data-method="POST" data-path="home/360/mortgage" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-mortgage', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-mortgage" onclick="tryItOut('POSThome-360-mortgage');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-mortgage" onclick="cancelTryOut('POSThome-360-mortgage');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-mortgage" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/mortgage</code></b>
</p>
</form>


## home/360/income




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/income" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/income"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-income" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-income"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-income"></code></pre>
</div>
<div id="execution-error-POSThome-360-income" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-income"></code></pre>
</div>
<form id="form-POSThome-360-income" data-method="POST" data-path="home/360/income" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-income', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-income" onclick="tryItOut('POSThome-360-income');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-income" onclick="cancelTryOut('POSThome-360-income');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-income" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/income</code></b>
</p>
</form>


## home/360/equity




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/equity" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/equity"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-equity" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-equity"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-equity"></code></pre>
</div>
<div id="execution-error-POSThome-360-equity" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-equity"></code></pre>
</div>
<form id="form-POSThome-360-equity" data-method="POST" data-path="home/360/equity" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-equity', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-equity" onclick="tryItOut('POSThome-360-equity');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-equity" onclick="cancelTryOut('POSThome-360-equity');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-equity" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/equity</code></b>
</p>
</form>


## home/360/protection




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/protection" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/protection"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-protection" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-protection"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-protection"></code></pre>
</div>
<div id="execution-error-POSThome-360-protection" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-protection"></code></pre>
</div>
<form id="form-POSThome-360-protection" data-method="POST" data-path="home/360/protection" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-protection', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-protection" onclick="tryItOut('POSThome-360-protection');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-protection" onclick="cancelTryOut('POSThome-360-protection');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-protection" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/protection</code></b>
</p>
</form>


## home/360/retirement




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/retirement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/retirement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-retirement" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-retirement"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-retirement"></code></pre>
</div>
<div id="execution-error-POSThome-360-retirement" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-retirement"></code></pre>
</div>
<form id="form-POSThome-360-retirement" data-method="POST" data-path="home/360/retirement" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-retirement', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-retirement" onclick="tryItOut('POSThome-360-retirement');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-retirement" onclick="cancelTryOut('POSThome-360-retirement');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-retirement" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/retirement</code></b>
</p>
</form>


## home/360/improve/roi




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/improve/roi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/improve/roi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-improve-roi" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-improve-roi"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-improve-roi"></code></pre>
</div>
<div id="execution-error-POSThome-360-improve-roi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-improve-roi"></code></pre>
</div>
<form id="form-POSThome-360-improve-roi" data-method="POST" data-path="home/360/improve/roi" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-improve-roi', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-improve-roi" onclick="tryItOut('POSThome-360-improve-roi');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-improve-roi" onclick="cancelTryOut('POSThome-360-improve-roi');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-improve-roi" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/improve/roi</code></b>
</p>
</form>


## home/360/philantrophy




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/philantrophy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/philantrophy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-philantrophy" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-philantrophy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-philantrophy"></code></pre>
</div>
<div id="execution-error-POSThome-360-philantrophy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-philantrophy"></code></pre>
</div>
<form id="form-POSThome-360-philantrophy" data-method="POST" data-path="home/360/philantrophy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-philantrophy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-philantrophy" onclick="tryItOut('POSThome-360-philantrophy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-philantrophy" onclick="cancelTryOut('POSThome-360-philantrophy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-philantrophy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/philantrophy</code></b>
</p>
</form>


## home/360/cash/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/cash/illo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/cash/illo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-cash--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-cash--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-cash--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-cash--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-cash--id-"></code></pre>
</div>
<form id="form-POSThome-360-cash--id-" data-method="POST" data-path="home/360/cash/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-cash--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-cash--id-" onclick="tryItOut('POSThome-360-cash--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-cash--id-" onclick="cancelTryOut('POSThome-360-cash--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-cash--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/cash/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-cash--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/mortgage/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/mortgage/accusamus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/mortgage/accusamus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-mortgage--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-mortgage--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-mortgage--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-mortgage--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-mortgage--id-"></code></pre>
</div>
<form id="form-POSThome-360-mortgage--id-" data-method="POST" data-path="home/360/mortgage/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-mortgage--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-mortgage--id-" onclick="tryItOut('POSThome-360-mortgage--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-mortgage--id-" onclick="cancelTryOut('POSThome-360-mortgage--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-mortgage--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/mortgage/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-mortgage--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/liability/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/liability/debitis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/liability/debitis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-liability--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-liability--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-liability--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-liability--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-liability--id-"></code></pre>
</div>
<form id="form-POSThome-360-liability--id-" data-method="POST" data-path="home/360/liability/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-liability--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-liability--id-" onclick="tryItOut('POSThome-360-liability--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-liability--id-" onclick="cancelTryOut('POSThome-360-liability--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-liability--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/liability/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-liability--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/retirement/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/retirement/nesciunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/retirement/nesciunt"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-retirement--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-retirement--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-retirement--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-retirement--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-retirement--id-"></code></pre>
</div>
<form id="form-POSThome-360-retirement--id-" data-method="POST" data-path="home/360/retirement/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-retirement--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-retirement--id-" onclick="tryItOut('POSThome-360-retirement--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-retirement--id-" onclick="cancelTryOut('POSThome-360-retirement--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-retirement--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/retirement/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-retirement--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/equity/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/equity/odit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/equity/odit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-equity--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-equity--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-equity--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-equity--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-equity--id-"></code></pre>
</div>
<form id="form-POSThome-360-equity--id-" data-method="POST" data-path="home/360/equity/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-equity--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-equity--id-" onclick="tryItOut('POSThome-360-equity--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-equity--id-" onclick="cancelTryOut('POSThome-360-equity--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-equity--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/equity/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-equity--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/protection/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/protection/consequatur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/protection/consequatur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-protection--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-protection--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-protection--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-protection--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-protection--id-"></code></pre>
</div>
<form id="form-POSThome-360-protection--id-" data-method="POST" data-path="home/360/protection/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-protection--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-protection--id-" onclick="tryItOut('POSThome-360-protection--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-protection--id-" onclick="cancelTryOut('POSThome-360-protection--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-protection--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/protection/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-protection--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/360/income/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/income/dolorem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/income/dolorem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-income--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-income--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-income--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-income--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-income--id-"></code></pre>
</div>
<form id="form-POSThome-360-income--id-" data-method="POST" data-path="home/360/income/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-income--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-income--id-" onclick="tryItOut('POSThome-360-income--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-income--id-" onclick="cancelTryOut('POSThome-360-income--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-income--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/income/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-income--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update Non Asset Porrtfolio Income


Update Non Portfolio Period

> Example request:

```bash
curl -X POST \
    "http://localhost/home/360/income/records/sunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/360/income/records/sunt"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-360-income-records--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-360-income-records--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-360-income-records--id-"></code></pre>
</div>
<div id="execution-error-POSThome-360-income-records--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-360-income-records--id-"></code></pre>
</div>
<form id="form-POSThome-360-income-records--id-" data-method="POST" data-path="home/360/income/records/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-360-income-records--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-360-income-records--id-" onclick="tryItOut('POSThome-360-income-records--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-360-income-records--id-" onclick="cancelTryOut('POSThome-360-income-records--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-360-income-records--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/360/income/records/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-360-income-records--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/portfolio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-portfolio" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-portfolio"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-portfolio"></code></pre>
</div>
<div id="execution-error-GEThome-portfolio" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-portfolio"></code></pre>
</div>
<form id="form-GEThome-portfolio" data-method="GET" data-path="home/portfolio" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-portfolio', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-portfolio" onclick="tryItOut('GEThome-portfolio');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-portfolio" onclick="cancelTryOut('GEThome-portfolio');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-portfolio" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/portfolio</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/home/portfolio/asset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/asset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-portfolio-asset" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-portfolio-asset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-portfolio-asset"></code></pre>
</div>
<div id="execution-error-POSThome-portfolio-asset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-portfolio-asset"></code></pre>
</div>
<form id="form-POSThome-portfolio-asset" data-method="POST" data-path="home/portfolio/asset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-portfolio-asset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-portfolio-asset" onclick="tryItOut('POSThome-portfolio-asset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-portfolio-asset" onclick="cancelTryOut('POSThome-portfolio-asset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-portfolio-asset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/portfolio/asset</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/portfolio/asset/non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/asset/non"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-portfolio-asset--type-" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-portfolio-asset--type-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-portfolio-asset--type-"></code></pre>
</div>
<div id="execution-error-GEThome-portfolio-asset--type-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-portfolio-asset--type-"></code></pre>
</div>
<form id="form-GEThome-portfolio-asset--type-" data-method="GET" data-path="home/portfolio/asset/{type}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-portfolio-asset--type-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-portfolio-asset--type-" onclick="tryItOut('GEThome-portfolio-asset--type-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-portfolio-asset--type-" onclick="cancelTryOut('GEThome-portfolio-asset--type-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-portfolio-asset--type-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/portfolio/asset/{type}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>type</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="type" data-endpoint="GEThome-portfolio-asset--type-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/{braid}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/portfolio/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/omnis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-portfolio--braid-" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-portfolio--braid-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-portfolio--braid-"></code></pre>
</div>
<div id="execution-error-GEThome-portfolio--braid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-portfolio--braid-"></code></pre>
</div>
<form id="form-GEThome-portfolio--braid-" data-method="GET" data-path="home/portfolio/{braid}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-portfolio--braid-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-portfolio--braid-" onclick="tryItOut('GEThome-portfolio--braid-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-portfolio--braid-" onclick="cancelTryOut('GEThome-portfolio--braid-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-portfolio--braid-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/portfolio/{braid}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="GEThome-portfolio--braid-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/{braid}/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/portfolio/nulla/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/nulla/voluptatem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-portfolio--braid---id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-portfolio--braid---id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-portfolio--braid---id-"></code></pre>
</div>
<div id="execution-error-GEThome-portfolio--braid---id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-portfolio--braid---id-"></code></pre>
</div>
<form id="form-GEThome-portfolio--braid---id-" data-method="GET" data-path="home/portfolio/{braid}/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-portfolio--braid---id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-portfolio--braid---id-" onclick="tryItOut('GEThome-portfolio--braid---id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-portfolio--braid---id-" onclick="cancelTryOut('GEThome-portfolio--braid---id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-portfolio--braid---id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/portfolio/{braid}/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="GEThome-portfolio--braid---id-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GEThome-portfolio--braid---id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/{braid}/{id}/financial




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/portfolio/veritatis/nesciunt/financial" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/veritatis/nesciunt/financial"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-portfolio--braid---id--financial" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-portfolio--braid---id--financial"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-portfolio--braid---id--financial"></code></pre>
</div>
<div id="execution-error-GEThome-portfolio--braid---id--financial" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-portfolio--braid---id--financial"></code></pre>
</div>
<form id="form-GEThome-portfolio--braid---id--financial" data-method="GET" data-path="home/portfolio/{braid}/{id}/financial" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-portfolio--braid---id--financial', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-portfolio--braid---id--financial" onclick="tryItOut('GEThome-portfolio--braid---id--financial');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-portfolio--braid---id--financial" onclick="cancelTryOut('GEThome-portfolio--braid---id--financial');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-portfolio--braid---id--financial" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/portfolio/{braid}/{id}/financial</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="GEThome-portfolio--braid---id--financial" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GEThome-portfolio--braid---id--financial" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/update/photo/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/portfolio/update/photo/error" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/update/photo/error"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-portfolio-update-photo--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-portfolio-update-photo--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-portfolio-update-photo--id-"></code></pre>
</div>
<div id="execution-error-POSThome-portfolio-update-photo--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-portfolio-update-photo--id-"></code></pre>
</div>
<form id="form-POSThome-portfolio-update-photo--id-" data-method="POST" data-path="home/portfolio/update/photo/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-portfolio-update-photo--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-portfolio-update-photo--id-" onclick="tryItOut('POSThome-portfolio-update-photo--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-portfolio-update-photo--id-" onclick="cancelTryOut('POSThome-portfolio-update-photo--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-portfolio-update-photo--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/portfolio/update/photo/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-portfolio-update-photo--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/update/records/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/portfolio/update/records/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/update/records/omnis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-portfolio-update-records--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-portfolio-update-records--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-portfolio-update-records--id-"></code></pre>
</div>
<div id="execution-error-POSThome-portfolio-update-records--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-portfolio-update-records--id-"></code></pre>
</div>
<form id="form-POSThome-portfolio-update-records--id-" data-method="POST" data-path="home/portfolio/update/records/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-portfolio-update-records--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-portfolio-update-records--id-" onclick="tryItOut('POSThome-portfolio-update-records--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-portfolio-update-records--id-" onclick="cancelTryOut('POSThome-portfolio-update-records--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-portfolio-update-records--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/portfolio/update/records/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-portfolio-update-records--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/update/note/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/portfolio/update/note/rerum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/update/note/rerum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-portfolio-update-note--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-portfolio-update-note--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-portfolio-update-note--id-"></code></pre>
</div>
<div id="execution-error-POSThome-portfolio-update-note--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-portfolio-update-note--id-"></code></pre>
</div>
<form id="form-POSThome-portfolio-update-note--id-" data-method="POST" data-path="home/portfolio/update/note/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-portfolio-update-note--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-portfolio-update-note--id-" onclick="tryItOut('POSThome-portfolio-update-note--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-portfolio-update-note--id-" onclick="cancelTryOut('POSThome-portfolio-update-note--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-portfolio-update-note--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/portfolio/update/note/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-portfolio-update-note--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/portfolio/update/details/{id}




> Example request:

```bash
curl -X POST \
    "http://localhost/home/portfolio/update/details/possimus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/portfolio/update/details/possimus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-portfolio-update-details--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-portfolio-update-details--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-portfolio-update-details--id-"></code></pre>
</div>
<div id="execution-error-POSThome-portfolio-update-details--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-portfolio-update-details--id-"></code></pre>
</div>
<form id="form-POSThome-portfolio-update-details--id-" data-method="POST" data-path="home/portfolio/update/details/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-portfolio-update-details--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-portfolio-update-details--id-" onclick="tryItOut('POSThome-portfolio-update-details--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-portfolio-update-details--id-" onclick="cancelTryOut('POSThome-portfolio-update-details--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-portfolio-update-details--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/portfolio/update/details/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSThome-portfolio-update-details--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## home/favourite




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/favourite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/favourite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-favourite" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-favourite"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-favourite"></code></pre>
</div>
<div id="execution-error-GEThome-favourite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-favourite"></code></pre>
</div>
<form id="form-GEThome-favourite" data-method="GET" data-path="home/favourite" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-favourite', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-favourite" onclick="tryItOut('GEThome-favourite');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-favourite" onclick="cancelTryOut('GEThome-favourite');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-favourite" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/favourite</code></b>
</p>
</form>


## home/favourite/ganp




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/favourite/ganp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/favourite/ganp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-favourite-ganp" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-favourite-ganp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-favourite-ganp"></code></pre>
</div>
<div id="execution-error-GEThome-favourite-ganp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-favourite-ganp"></code></pre>
</div>
<form id="form-GEThome-favourite-ganp" data-method="GET" data-path="home/favourite/ganp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-favourite-ganp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-favourite-ganp" onclick="tryItOut('GEThome-favourite-ganp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-favourite-ganp" onclick="cancelTryOut('GEThome-favourite-ganp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-favourite-ganp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/favourite/ganp</code></b>
</p>
</form>


## home/invite




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/invite" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/invite"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-invite" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-invite"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-invite"></code></pre>
</div>
<div id="execution-error-GEThome-invite" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-invite"></code></pre>
</div>
<form id="form-GEThome-invite" data-method="GET" data-path="home/invite" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-invite', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-invite" onclick="tryItOut('GEThome-invite');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-invite" onclick="cancelTryOut('GEThome-invite');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-invite" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/invite</code></b>
</p>
</form>


## home/feedback




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/feedback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/feedback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GEThome-feedback" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-feedback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-feedback"></code></pre>
</div>
<div id="execution-error-GEThome-feedback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-feedback"></code></pre>
</div>
<form id="form-GEThome-feedback" data-method="GET" data-path="home/feedback" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-feedback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-feedback" onclick="tryItOut('GEThome-feedback');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-feedback" onclick="cancelTryOut('GEThome-feedback');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-feedback" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/feedback</code></b>
</p>
</form>


## home/feedback




> Example request:

```bash
curl -X POST \
    "http://localhost/home/feedback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/feedback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSThome-feedback" hidden>
    <blockquote>Received response<span id="execution-response-status-POSThome-feedback"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSThome-feedback"></code></pre>
</div>
<div id="execution-error-POSThome-feedback" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSThome-feedback"></code></pre>
</div>
<form id="form-POSThome-feedback" data-method="POST" data-path="home/feedback" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSThome-feedback', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSThome-feedback" onclick="tryItOut('POSThome-feedback');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSThome-feedback" onclick="cancelTryOut('POSThome-feedback');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSThome-feedback" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>home/feedback</code></b>
</p>
</form>


## home/support




> Example request:

```bash
curl -X GET \
    -G "http://localhost/home/support" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home/support"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">

    <title>MyGaphub</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles --> 
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--  -->
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/assets/css/mygap.css" rel="stylesheet">
    <!-- Scripts -->
    <!--  -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/Chart.js"></script>
    <script src="http://localhost/assets/js/script.js"></script> 
    
                    </head>

<body>
    <div id="app">
        <main class="row m-0 bg-white">
            <div class="col-md-2 side bg-white  hg-f1 gap-col-side"  style="">
                <div class="col-inner ">
                    <div class="logo">
                        <div class="wrapper">
                            <img class="img img-responsive" src="http://localhost/assets/images/logo.png" alt="">
                        </div> 
                    </div>
                    <nav class="sidenav">
    <ul class="list">
        <p class="list-item current-page  "> 
            <a href="http://localhost/home" class="  ">
                <img src="http://localhost/assets/icon/dashboard.png" class="icon" alt="">
                  <span  class="bold">Dashboard</span>  </a> 
        </p> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Planning</h6> 
        <li class="list-item ">
            <a href="http://localhost/home/seed" class=""> 
                
                <img src="http://localhost/assets/icon/Seed.png" class="icon" alt="" style="width: 32px;height: 30px;margin-right: 4px;">
                <span class="bold" >SEED</span> <br>
                <h6 class="list-item-subtitle jp">(Budgeting)</h6>
            </a>
        </li>  

        <li class="list-item ">
            <a href="http://localhost/actionplan" class="">
             
             <img src="http://localhost/assets/icon/strategy.png" class="icon" alt="" style="width: 36px;height: 34px;margin-right: 0px;">
             <span class="bold">Action Plan</span>  <br>
             <h6 class="list-item-subtitle jp">(Strategy)</h6> 
            </a>  
         </li> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Execution</h6>
        <li class="list-item ">
            <a href="http://localhost/acquisition" class=""> 
                <img src="http://localhost/assets/icon/Acquisition.png" class="icon" alt="">
                <span  class="bold">Acquisition</span>
            </a>
        </li>
        <div class="seperate"></div>
        <h6 class="list-group-head">Management</h6>
        <li class="list-item ">
            <a href="http://localhost/home/portfolio" class="">
                <img src="http://localhost/assets/icon/portfolio.png" class="icon" alt="">
                    <span  class="bold">Portfolio</span>
            </a>  
        </li>
        <li class="list-item ">
            <a href="http://localhost/home/7g" class="">
                <img src="http://localhost/assets/icon/analytics.png" class="icon" alt="">
                <span  class="bold">Analytics</span>
            </a>
        </li>
        <li class="list-item ">
            <a href="http://localhost/home/360" class="">
                <img src="http://localhost/assets/icon/360.png" class="icon" style="width:34px; height:34px;" alt="">
                <span  class="bold">360<sup>o</sup></span>
            </a>
        </li>
        <div class="seperate"></div> 
        <h6 class="list-group-head"></h6>
         <li class="list-item ">
            <a href="http://localhost/home/feedback" class=" "> 
                <img src="http://localhost/assets/icon/feedback.png" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Feedback</span>
            </a>  
         </li>
         <li class="list-item ">
            <a href="http://localhost/home/tools" class=" "> 
                <img src="http://localhost/assets/icon/Other_tools.png" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Other Tools</span>
            </a>  
         </li>
        
        <div class="seperate"></div>
        
        <li class="list-item bg-none">
            <a href="http://localhost/logout" class="d-flex"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <span class="gt bold" >Logout</span>
               <span class="pull-right">    
                   <img src="http://localhost/assets/images/mygap.png" alt="" class="icon text-right">
               </span>
            </a> 
            <form id="logout-form" action="http://localhost/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">            </form>
        </li>
    </ul>
</nav>                </div>
            </div>
            <div class="col-lg-10 gap-col-main" style="">
                <div class="mob-nav">
                    <nav id="usernav" class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://www.mygaphub.com/">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>  

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("usernav");
    var sticky = navbar.offsetTop;
    // console.log('User Nav',window.pageYOffset , sticky);
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
</script> 
<!-- <script type="text/javascript">
    (function() {
        window.sib = {
            equeue: [], 
            client_key: "xwrdk9srs6n8xv2z6dt3d8ip"
        };
        /* OPTIONAL: email for identify request*/
        window.sendinblue = {};
        
        for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                        var t = {};
                        t[k] = arg;
                        window.sib.equeue.push(t);
                    })(arg[0], arg[1], arg[2]);
                };
            })(j[i]);
        }
        console.log(window.sendinblue);
        var n = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];
        n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
    })();
</script> -->

                </div>
                                   <div id="topbar" class="py-2 bg-gray mb-3">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class=" col-8">
                <div class="row mx-0">
                                        <div class="col">
                        <h4 class="bold ff-rob text-center page-title"> 
                            Quick Start Guide                                                    </h4>
                    </div>
                </div>
                                            </div> 
            <div class="col-4 text-right">
                <div class="wel-profile  
                            ">
                      
                        <span class="mt-2 mr-4 sm-mr-1"> 
                            <a href="http://localhost/home/notifications">
                                <img src="http://localhost/assets/icon/alert_bell.png" class="top-profile profile img img-responsive" alt="">
                                                           </a>
                        </span> 
                                        
                    <div style="" 
                            class="wel-img  
                            ">
                        <a href="http://localhost/home/tools/profile">
                                                            <img src="http://localhost/assets/storage/avatar/default.png"  class="top-profile profile img img-responsive  rounded-circle" data-toggle="tooltip" title="Click to Go to Settings">
                                                    </a>
                    </div>  
                </div>    
            </div>
        </div>
    </div> 
</div>

                                <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
                
<div class="">
    <div class="gap-car " style="min-height: 500px;">
        <div class="row mx-4">
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`F09LFhTcXTM`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/F09LFhTcXTM/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/F09LFhTcXTM/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to Register on GAPhub </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`UUhvK8xWl4g`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/UUhvK8xWl4g/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/UUhvK8xWl4g/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to validate 7G Assumptions </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`SJF_r22JWLg`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/SJF_r22JWLg/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/SJF_r22JWLg/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to reserve an asset </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`VhynUYrpH9o`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/VhynUYrpH9o/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/VhynUYrpH9o/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to onboard/add an existing asse </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`ZJ7TOsVYBRg`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/ZJ7TOsVYBRg/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/ZJ7TOsVYBRg/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to set up your budget </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                              <div class="col-md-6 col-12-sm-12">
                     <div class="mb-5 mx-2">
                         <picture onclick="playSupport(`fiXy1T8sbik`)">
                             <source media="(max-width: 560px)" srcset="https://i.ytimg.com/vi_webp/fiXy1T8sbik/mqdefault.webp">
                             <img src="https://i.ytimg.com/vi_webp/fiXy1T8sbik/mqdefault.webp" alt=""
                                style="position: relative;
                                    width: 90%; height: 90%;
                                    top: 0px; left: 0px; cursor:  pointer;
                                    object-fit: cover;" > 
                         </picture>
                         <div>
                             <!-- YgmIl8fF-tw
                             https://i.ytimg.com/an_webp/F09LFhTcXTM/mqdefault_6s.webp?du=3000&sqp=CJnm5I4G&rs=AOn4CLBcJQcgLTLUIrxO4OgJIlZ-Q73d0g
                            https://i.ytimg.com/an_webp/YgmIl8fF-tw/mqdefault_6s.webp?du=3000&sqp=CMC94I4G&rs=AOn4CLDgttL8v2toeb2V_uvkx2WU4Uwouw
                            -->
                            <span class="Text__Caption-sc-11x2ir8-16 PageCard__CardLabel-sc-1wdpqm4-3 cVNTwU">Video Tutorial</span>
                            <h2 class="Text__Title1-sc-11x2ir8-9 jgnctv title">How to calculate financial independence </h2>
                            <!--<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, architecto.</p> -->
                         </div>
                     </div>
                 </div> 
                     </div>
    </div>

    <div class="modal fade" id="gaphubSupport" tabindex="-1" role="dialog" aria-labelledby="gaphubSupportLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content b-rad-20 wd-c">  
                <div class="modal-header">
                    <h5 class="modal-title" id="gaphubSupportLabel">GAPhub Support</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>  
                <div class="modal-body" style="min-height: 150px;">
                    <div class="mt-2 mb-4">
                        <iframe class="sm-wdf" width="560" height="315" id="ytplayer" src="" title="GAPhub support" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div> 
            </div>
        </div>
    </div> 
    <script>
        function playSupport(youtubeId){
            $('#gaphubSupport').modal('show');
            $('#ytplayer').attr('src', 'https://www.youtube.com/embed/'+youtubeId+'?autoplay=1');
        }
    </script>
 </div>
 
            </div>
            <div class="fixed-bottom mob-nav">
                <div class="menu bg-gray list pb-2" style="background: rgba(73, 73, 73, .9);">
    <ul class="row mx-0 mt-2 p-0"> 
         <li class="col  mob-list-item">    
             <a href="http://localhost/home" class=""> 
                 <img src="http://localhost/assets/mob/snapshot000.png" class="ml-2 icon" style="min-height: 26px" alt=""><br>
                 <span class="small text-light" >Snapshot</span>
             </a> 
         </li>   
         
         <li class="col  mob-list-item">
             <a href="http://localhost/home/7g" class="">
                 <img src="http://localhost/assets/mob/analytics000.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Analytics</span>
             </a>
         </li>
         
         <li class="col  mob-list-item">
             <a href="http://localhost/acquisition" class=""> 
                 <img src="http://localhost/assets/mob/acquisition000.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Acquisition</span>
             </a>
         </li>

         <li class="col  mob-list-item">
             <a href="http://localhost/home/portfolio" class="">
                 <img src="http://localhost/assets/mob/portfolio000.png" class="ml-2 icon" alt=""><br>
                     <span  class="small text-light">Portfolio</span>
             </a>  
         </li>
         
         <li class="col  mob-list-item">
             <a href="http://localhost/home/tools" class=" "> 
                 <img src="http://localhost/assets/mob/more000.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">More</span>
             </a>  
         </li>
    </ul>
 </div>            </div>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js"></script>
   
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script> 
    
    
        
<script>
function sortAsset(e){
    var sort = document.getElementById('sort').value;
    // console.log(sort,href);return
    // var href = "http://localhost/home/support";
    if(sort && href){
        // href = href.replace('ganp', 'search');
        window.location = href+`&sort=${sort}`; 
    }
}

$('document').ready( function(){
    var isSort = false;
    $('#toggle_sort').on('click', function(e) {
        if(isSort){ }else{
            $('#sort_widget').fadeIn();
            $('#sort_widget').addClass('d-inline');
            $('#toggle_sort').hide();
        }
    });
    var search = false;
    var more = document.getElementById('more-search-options-toggle');
    if (more) {
        more.addEventListener('click', ()=> {
            if(!this.search){
                $('#more-reap-search').fadeIn(500);
                $('#reaplayer').addClass('htp-20');
                // $('#reaplayer').style("height", "200px");
                this.search = !this.search;
            }else{
                $('#more-reap-search').hide();
                $('#reaplayer').removeClass('htp-20');
                this.search = !this.search;
            }
        })
    } 

}); 
</script>


 
     
      <!--  -->
      <script>
        var _0x5fbe=["\x7B\x7B\x65\x6E\x76\x28\x22\x4D\x49\x58\x5F\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x4B\x45\x59\x22\x2C\x22\x36\x38\x62\x34\x38\x31\x33\x66\x38\x34\x37\x32\x66\x63\x65\x34\x34\x64\x38\x66\x22\x29\x7D\x7D","\x7B\x7B\x65\x6E\x76\x28\x22\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x43\x4C\x55\x53\x54\x45\x52\x22\x2C\x22\x65\x75\x22\x29\x7D\x7D","\x70\x72\x65\x73\x65\x6E\x63\x65\x2D\x63\x68\x61\x74","\x73\x75\x62\x73\x63\x72\x69\x62\x65","\x41\x70\x70\x5C\x45\x76\x65\x6E\x74\x73\x5C\x4E\x65\x77\x4D\x65\x73\x73\x61\x67\x65","\x6C\x6F\x67","\x4D\x79\x47\x61\x70\x68\x75\x62\x20\x52\x65\x6D\x69\x6E\x64\x65\x72","\x6D\x65\x73\x73\x61\x67\x65","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x79\x67\x61\x70\x68\x75\x62\x2E\x63\x6F\x6D\x2F\x61\x70\x70\x2F\x61\x73\x73\x65\x74\x73\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2E\x70\x6E\x67","\x66\x6F\x63\x75\x73","\x63\x6C\x6F\x73\x65","\x63\x72\x65\x61\x74\x65","\x62\x69\x6E\x64"];var pusher= new Pusher(_0x5fbe[0],{cluster:_0x5fbe[1],encrypted:true});var channel=pusher[_0x5fbe[3]](_0x5fbe[2]);channel[_0x5fbe[12]](_0x5fbe[4],function(_0xc0dax3){console[_0x5fbe[5]](_0xc0dax3);Push[_0x5fbe[11]](_0x5fbe[6],{body:_0xc0dax3[_0x5fbe[7]],icon:_0x5fbe[8],timeout:5000,onClick:function(){window[_0x5fbe[9]]();this[_0x5fbe[10]]()}})})
    </script> 
    
</body>
</html>

```
<div id="execution-results-GEThome-support" hidden>
    <blockquote>Received response<span id="execution-response-status-GEThome-support"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GEThome-support"></code></pre>
</div>
<div id="execution-error-GEThome-support" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GEThome-support"></code></pre>
</div>
<form id="form-GEThome-support" data-method="GET" data-path="home/support" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GEThome-support', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GEThome-support" onclick="tryItOut('GEThome-support');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GEThome-support" onclick="cancelTryOut('GEThome-support');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GEThome-support" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>home/support</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">

    <title>MyGaphub</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- Styles --> 
    
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--  -->
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/assets/css/mygap.css" rel="stylesheet">
    <!-- Scripts -->
    <!--  -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/Chart.js"></script>
    <script src="http://localhost/assets/js/script.js"></script> 
    
                    </head>

<body>
    <div id="app">
        <main class="row m-0 bg-white">
            <div class="col-md-2 side bg-white  hg-f1 gap-col-side"  style="">
                <div class="col-inner ">
                    <div class="logo">
                        <div class="wrapper">
                            <img class="img img-responsive" src="http://localhost/assets/images/logo.png" alt="">
                        </div> 
                    </div>
                    <nav class="sidenav">
    <ul class="list">
        <p class="list-item current-page  "> 
            <a href="http://localhost/home" class="  ">
                <img src="http://localhost/assets/icon/dashboard.png" class="icon" alt="">
                  <span  class="bold">Dashboard</span>  </a> 
        </p> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Planning</h6> 
        <li class="list-item ">
            <a href="http://localhost/home/seed" class=""> 
                
                <img src="http://localhost/assets/icon/Seed.png" class="icon" alt="" style="width: 32px;height: 30px;margin-right: 4px;">
                <span class="bold" >SEED</span> <br>
                <h6 class="list-item-subtitle jp">(Budgeting)</h6>
            </a>
        </li>  

        <li class="list-item ">
            <a href="http://localhost/actionplan" class="">
             
             <img src="http://localhost/assets/icon/strategy.png" class="icon" alt="" style="width: 36px;height: 34px;margin-right: 0px;">
             <span class="bold">Action Plan</span>  <br>
             <h6 class="list-item-subtitle jp">(Strategy)</h6> 
            </a>  
         </li> 
        <div class="seperate"></div>
        <h6 class="list-group-head">Execution</h6>
        <li class="list-item active">
            <a href="http://localhost/acquisition" class="txt-primary"> 
                <img src="http://localhost/assets/icon/Acquisition_red.png" class="icon" alt="">
                <span  class="bold">Acquisition</span>
            </a>
        </li>
        <div class="seperate"></div>
        <h6 class="list-group-head">Management</h6>
        <li class="list-item ">
            <a href="http://localhost/home/portfolio" class="">
                <img src="http://localhost/assets/icon/portfolio.png" class="icon" alt="">
                    <span  class="bold">Portfolio</span>
            </a>  
        </li>
        <li class="list-item ">
            <a href="http://localhost/home/7g" class="">
                <img src="http://localhost/assets/icon/analytics.png" class="icon" alt="">
                <span  class="bold">Analytics</span>
            </a>
        </li>
        <li class="list-item ">
            <a href="http://localhost/home/360" class="">
                <img src="http://localhost/assets/icon/360.png" class="icon" style="width:34px; height:34px;" alt="">
                <span  class="bold">360<sup>o</sup></span>
            </a>
        </li>
        <div class="seperate"></div> 
        <h6 class="list-group-head"></h6>
         <li class="list-item ">
            <a href="http://localhost/home/feedback" class=" "> 
                <img src="http://localhost/assets/icon/feedback.png" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Feedback</span>
            </a>  
         </li>
         <li class="list-item ">
            <a href="http://localhost/home/tools" class=" "> 
                <img src="http://localhost/assets/icon/Other_tools.png" class="icon" style="width:36px; height:36px;" alt="">
                <span  class="bold">Other Tools</span>
            </a>  
         </li>
        
        <div class="seperate"></div>
        
        <li class="list-item bg-none">
            <a href="http://localhost/logout" class="d-flex"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
               <span class="gt bold" >Logout</span>
               <span class="pull-right">    
                   <img src="http://localhost/assets/images/mygap.png" alt="" class="icon text-right">
               </span>
            </a> 
            <form id="logout-form" action="http://localhost/logout" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q">            </form>
        </li>
    </ul>
</nav>                </div>
            </div>
            <div class="col-lg-10 gap-col-main" style="">
                <div class="mob-nav">
                    <nav id="usernav" class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="https://www.mygaphub.com/">
            <img src="http://localhost/assets/images/logo.png" class="logo_main" alt="Logo_Src-Small_71_243" height="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>  

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                            </ul>
        </div>
    </div>
</nav>
<script>
    var navbar = document.getElementById("usernav");
    var sticky = navbar.offsetTop;
    // console.log('User Nav',window.pageYOffset , sticky);
     window.onscroll = function() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    };
</script> 
<!-- <script type="text/javascript">
    (function() {
        window.sib = {
            equeue: [], 
            client_key: "xwrdk9srs6n8xv2z6dt3d8ip"
        };
        /* OPTIONAL: email for identify request*/
        window.sendinblue = {};
        
        for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                        var t = {};
                        t[k] = arg;
                        window.sib.equeue.push(t);
                    })(arg[0], arg[1], arg[2]);
                };
            })(j[i]);
        }
        console.log(window.sendinblue);
        var n = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];
        n.type = "text/javascript", n.id = "sendinblue-js", n.async = !0, n.src = "https://sibautomation.com/sa.js?key=" + window.sib.client_key, i.parentNode.insertBefore(n, i), window.sendinblue.page();
    })();
</script> -->

                </div>
                                   <div id="topbar" class="py-2 bg-gray mb-3">
    <div class="container-fluid mt-2">
        <div class="row">
            <div class=" col-8">
                <div class="row mx-0">
                                        <div class="col">
                        <h4 class="bold ff-rob text-center page-title"> 
                                                                                </h4>
                    </div>
                </div>
                                            </div> 
            <div class="col-4 text-right">
                <div class="wel-profile  
                            ">
                      
                        <span class="mt-2 mr-4 sm-mr-1"> 
                            <a href="http://localhost/home/notifications">
                                <img src="http://localhost/assets/icon/alert_bell.png" class="top-profile profile img img-responsive" alt="">
                                                           </a>
                        </span> 
                                        
                    <div style="" 
                            class="wel-img  
                            ">
                        <a href="http://localhost/home/tools/profile">
                                                            <img src="http://localhost/assets/storage/avatar/default.png"  class="top-profile profile img img-responsive  rounded-circle" data-toggle="tooltip" title="Click to Go to Settings">
                                                    </a>
                    </div>  
                </div>    
            </div>
        </div>
    </div> 
</div>

                                <script>
    var errors = document.querySelectorAll('.alert');
    if(errors.length){
        setTimeout(() => {
            $('#msg').hide();
            errors.forEach(error => {
                error.classList.add("d-none"); 
            });
        }, 5 * 1000)
    }
 </script>
                    <div class="wd-f bg-white py-4">
        <div class="elevation-3 m-2 b-rad-20">
            <div class="gap-center-sm pt-2 text-center"> 
                <h2 class="gap-title">Asset Acquisition</h2>
                <h4 class="gap-subtitle fs-14">the only path that leads to financial independence. </h4>
            </div> 

            <div class="gap-lists  ml-0"> 
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="http://localhost/assets/images/wuuquywhqe-12835412.png" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body"> 
                        <h4 class="list-title">Business Asset </h4>
                        <p class="list-intro pr-2">Buy an existing business currently generating revenue. </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/actionplan?act=business&amp;ot=19856" class="card-link text-white">Action Plan</a> </button>
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/acquisition/asset/business" class="card-link text-white">Opportunities </a> </button>
                        </div>
                    </div>
                </div> 
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="http://localhost/assets/images/hq7uswer52.png" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body"> 
                        <h4 class="list-title">Risk Asset </h4>
                        <p class="list-intro pr-2">Explore the world of stocks and share. Many retirement plans in the world today are based on this vehicle. </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/actionplan?act=risk&amp;ot=16390" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/acquisition/asset/risk" class="card-link text-white">Opportunities</a> </button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="http://localhost/assets/images/7w22164504.png" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">Appreciating Asset </h4>
                        <p class="list-intro pr-2">Both Architecture and Agriculture rely on land to presents their solutions. You can profit from either. </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/actionplan?act=appreciate&amp;ot=38443" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/acquisition/asset/appreciating" class="card-link text-white">Opportunities</a> </button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="http://localhost/assets/images/uhafhgwhe-19677.png" alt=" " class="img img-responsive">
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">Intellectual Asset </h4>
                        <p class="list-intro pr-2">The most valuable asset in the world is the human brain. Take advantage of this opportunity. </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/actionplan?act=intellect&amp;ot=86285" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/acquisition/asset/intellectual" class="card-link text-white">Opportunities </a></button>
                        </div>
                    </div>
                </div>
                <div class="asset-list">
                    <div class="list-img img-right">
                        <img src="http://localhost/assets/images/ghabsnnd-157520.png" alt=" " class="img img-responsive">
                        <!-- <img src="http://localhost/assets/images/ghabsnnd-157520.png" alt=" " class="img img-responsive"> -->
                    </div>
                    <div class="list-body">
                        <h4 class="list-title">Depreciating Asset </h4>
                        <p class="list-intro pr-2">The world’s most popular asset is cash but only when it is in a good savings account. Explore your options. </p>
                        <div class="list-actions pr-2">
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/actionplan?act=depreciate&amp;ot=22995" class="card-link text-white">Action Plan</a></button>
                            <button type="button" class="btn btn-pry"> <a href="http://localhost/acquisition/asset/depreciating" class="card-link text-white"> Opportunities </a> </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 cal-head hd-acquire" id="authhead">
                <div class="overlay2">
                    <div class="disclaim text-center">
                        <p class="">DISCLAIMER: Our content is intended only for information purpose. It is important you 
                            conduct your own analysis before making any investment based on your own personal 
                            circumstances. You should take independent financial advice from an authorised 
                            professional. We are not a registered or authorised investment, legal or tax advisor firm. </p>  
                    </div>
                </div>
            </div>
        </div>
    </div> 
 
            </div>
            <div class="fixed-bottom mob-nav">
                <div class="menu bg-gray list pb-2" style="background: rgba(73, 73, 73, .9);">
    <ul class="row mx-0 mt-2 p-0"> 
         <li class="col  mob-list-item">    
             <a href="http://localhost/home" class=""> 
                 <img src="http://localhost/assets/mob/snapshot000.png" class="ml-2 icon" style="min-height: 26px" alt=""><br>
                 <span class="small text-light" >Snapshot</span>
             </a> 
         </li>   
         
         <li class="col  mob-list-item">
             <a href="http://localhost/home/7g" class="">
                 <img src="http://localhost/assets/mob/analytics000.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Analytics</span>
             </a>
         </li>
         
         <li class="col  mob-list-item">
             <a href="http://localhost/acquisition" class="txt-white active"> 
                 <img src="http://localhost/assets/mob/acquisitionFFF.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">Acquisition</span>
             </a>
         </li>

         <li class="col  mob-list-item">
             <a href="http://localhost/home/portfolio" class="">
                 <img src="http://localhost/assets/mob/portfolio000.png" class="ml-2 icon" alt=""><br>
                     <span  class="small text-light">Portfolio</span>
             </a>  
         </li>
         
         <li class="col  mob-list-item">
             <a href="http://localhost/home/tools" class=" "> 
                 <img src="http://localhost/assets/mob/more000.png" class="ml-2 icon" alt=""><br>
                 <span  class="small text-light">More</span>
             </a>  
         </li>
    </ul>
 </div>            </div>
        </main>
    </div>
    <script src="http://localhost/assets/js/app.js"></script>
   
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script> 
    
    
        
<script>
function sortAsset(e){
    var sort = document.getElementById('sort').value;
    // console.log(sort,href);return
    // var href = "http://localhost/acquisition";
    if(sort && href){
        // href = href.replace('ganp', 'search');
        window.location = href+`&sort=${sort}`; 
    }
}

$('document').ready( function(){
    var isSort = false;
    $('#toggle_sort').on('click', function(e) {
        if(isSort){ }else{
            $('#sort_widget').fadeIn();
            $('#sort_widget').addClass('d-inline');
            $('#toggle_sort').hide();
        }
    });
    var search = false;
    var more = document.getElementById('more-search-options-toggle');
    if (more) {
        more.addEventListener('click', ()=> {
            if(!this.search){
                $('#more-reap-search').fadeIn(500);
                $('#reaplayer').addClass('htp-20');
                // $('#reaplayer').style("height", "200px");
                this.search = !this.search;
            }else{
                $('#more-reap-search').hide();
                $('#reaplayer').removeClass('htp-20');
                this.search = !this.search;
            }
        })
    } 

}); 
</script>


 
     
      <!--  -->
      <script>
        var _0x5fbe=["\x7B\x7B\x65\x6E\x76\x28\x22\x4D\x49\x58\x5F\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x4B\x45\x59\x22\x2C\x22\x36\x38\x62\x34\x38\x31\x33\x66\x38\x34\x37\x32\x66\x63\x65\x34\x34\x64\x38\x66\x22\x29\x7D\x7D","\x7B\x7B\x65\x6E\x76\x28\x22\x50\x55\x53\x48\x45\x52\x5F\x41\x50\x50\x5F\x43\x4C\x55\x53\x54\x45\x52\x22\x2C\x22\x65\x75\x22\x29\x7D\x7D","\x70\x72\x65\x73\x65\x6E\x63\x65\x2D\x63\x68\x61\x74","\x73\x75\x62\x73\x63\x72\x69\x62\x65","\x41\x70\x70\x5C\x45\x76\x65\x6E\x74\x73\x5C\x4E\x65\x77\x4D\x65\x73\x73\x61\x67\x65","\x6C\x6F\x67","\x4D\x79\x47\x61\x70\x68\x75\x62\x20\x52\x65\x6D\x69\x6E\x64\x65\x72","\x6D\x65\x73\x73\x61\x67\x65","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x77\x77\x2E\x6D\x79\x67\x61\x70\x68\x75\x62\x2E\x63\x6F\x6D\x2F\x61\x70\x70\x2F\x61\x73\x73\x65\x74\x73\x2F\x69\x6D\x61\x67\x65\x73\x2F\x6C\x6F\x67\x6F\x2E\x70\x6E\x67","\x66\x6F\x63\x75\x73","\x63\x6C\x6F\x73\x65","\x63\x72\x65\x61\x74\x65","\x62\x69\x6E\x64"];var pusher= new Pusher(_0x5fbe[0],{cluster:_0x5fbe[1],encrypted:true});var channel=pusher[_0x5fbe[3]](_0x5fbe[2]);channel[_0x5fbe[12]](_0x5fbe[4],function(_0xc0dax3){console[_0x5fbe[5]](_0xc0dax3);Push[_0x5fbe[11]](_0x5fbe[6],{body:_0xc0dax3[_0x5fbe[7]],icon:_0x5fbe[8],timeout:5000,onClick:function(){window[_0x5fbe[9]]();this[_0x5fbe[10]]()}})})
    </script> 
    
</body>
</html>

```
<div id="execution-results-GETacquisition" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition"></code></pre>
</div>
<div id="execution-error-GETacquisition" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition"></code></pre>
</div>
<form id="form-GETacquisition" data-method="GET" data-path="acquisition" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition" onclick="tryItOut('GETacquisition');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition" onclick="cancelTryOut('GETacquisition');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition</code></b>
</p>
</form>


## acquisition/asset/{asset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/consequatur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/consequatur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/404'" />

        <title>Redirecting to http://localhost/404</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/404">http://localhost/404</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset--asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset--asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset--asset-"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset--asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset--asset-"></code></pre>
</div>
<form id="form-GETacquisition-asset--asset-" data-method="GET" data-path="acquisition/asset/{asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset--asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset--asset-" onclick="tryItOut('GETacquisition-asset--asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset--asset-" onclick="cancelTryOut('GETacquisition-asset--asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset--asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/{asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-asset--asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/reap/{sasset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/reap/sit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/reap/sit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/404'" />

        <title>Redirecting to http://localhost/404</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/404">http://localhost/404</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset-reap--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset-reap--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset-reap--sasset-"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset-reap--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset-reap--sasset-"></code></pre>
</div>
<form id="form-GETacquisition-asset-reap--sasset-" data-method="GET" data-path="acquisition/asset/reap/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset-reap--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset-reap--sasset-" onclick="tryItOut('GETacquisition-asset-reap--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset-reap--sasset-" onclick="cancelTryOut('GETacquisition-asset-reap--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset-reap--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/reap/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="GETacquisition-asset-reap--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/{asset}/reap




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/enim/reap" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/enim/reap"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/404'" />

        <title>Redirecting to http://localhost/404</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/404">http://localhost/404</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset--asset--reap" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset--asset--reap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset--asset--reap"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset--asset--reap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset--asset--reap"></code></pre>
</div>
<form id="form-GETacquisition-asset--asset--reap" data-method="GET" data-path="acquisition/asset/{asset}/reap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset--asset--reap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset--asset--reap" onclick="tryItOut('GETacquisition-asset--asset--reap');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset--asset--reap" onclick="cancelTryOut('GETacquisition-asset--asset--reap');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset--asset--reap" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/{asset}/reap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-asset--asset--reap" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/featured/asset




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/featured/asset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/featured/asset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Trying to get property 'id' of non-object",
    "exception": "ErrorException",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Helper\\GapExchangeHelper.php",
    "line": 46,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Helper\\GapExchangeHelper.php",
            "line": 46,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Http\\Controllers\\Web\\ListedAcquisitionController.php",
            "line": 37,
            "function": "reap_favourite",
            "class": "App\\Helper\\GapExchangeHelper",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "featuredReap",
            "class": "App\\Http\\Controllers\\Web\\ListedAcquisitionController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 261,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 204,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETacquisition-featured-asset" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-featured-asset"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-featured-asset"></code></pre>
</div>
<div id="execution-error-GETacquisition-featured-asset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-featured-asset"></code></pre>
</div>
<form id="form-GETacquisition-featured-asset" data-method="GET" data-path="acquisition/featured/asset" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-featured-asset', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-featured-asset" onclick="tryItOut('GETacquisition-featured-asset');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-featured-asset" onclick="cancelTryOut('GETacquisition-featured-asset');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-featured-asset" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/featured/asset</code></b>
</p>
</form>


## acquisition/asset/{asset}/ganp




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/accusantium/ganp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/accusantium/ganp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/404'" />

        <title>Redirecting to http://localhost/404</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/404">http://localhost/404</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset--asset--ganp" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset--asset--ganp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset--asset--ganp"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset--asset--ganp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset--asset--ganp"></code></pre>
</div>
<form id="form-GETacquisition-asset--asset--ganp" data-method="GET" data-path="acquisition/asset/{asset}/ganp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset--asset--ganp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset--asset--ganp" onclick="tryItOut('GETacquisition-asset--asset--ganp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset--asset--ganp" onclick="cancelTryOut('GETacquisition-asset--asset--ganp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset--asset--ganp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/{asset}/ganp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-asset--asset--ganp" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/ganp/{ganp_asset}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/ganp/explicabo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/ganp/explicabo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Trying to get property 'cultivation' of non-object",
    "exception": "ErrorException",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Http\\Controllers\\Web\\AcquisitionController.php",
    "line": 217,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Http\\Controllers\\Web\\AcquisitionController.php",
            "line": 217,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "ganpCultivation",
            "class": "App\\Http\\Controllers\\Web\\AcquisitionController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 261,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 204,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETacquisition-asset-ganp--ganp_asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset-ganp--ganp_asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset-ganp--ganp_asset-"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset-ganp--ganp_asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset-ganp--ganp_asset-"></code></pre>
</div>
<form id="form-GETacquisition-asset-ganp--ganp_asset-" data-method="GET" data-path="acquisition/asset/ganp/{ganp_asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset-ganp--ganp_asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset-ganp--ganp_asset-" onclick="tryItOut('GETacquisition-asset-ganp--ganp_asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset-ganp--ganp_asset-" onclick="cancelTryOut('GETacquisition-asset-ganp--ganp_asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset-ganp--ganp_asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/ganp/{ganp_asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>ganp_asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="ganp_asset" data-endpoint="GETacquisition-asset-ganp--ganp_asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/{asset}/search




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/quibusdam/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/quibusdam/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/acquisition/asset/ganp/explicabo'" />

        <title>Redirecting to http://localhost/acquisition/asset/ganp/explicabo</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/acquisition/asset/ganp/explicabo">http://localhost/acquisition/asset/ganp/explicabo</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset--asset--search" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset--asset--search"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset--asset--search"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset--asset--search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset--asset--search"></code></pre>
</div>
<form id="form-GETacquisition-asset--asset--search" data-method="GET" data-path="acquisition/asset/{asset}/search" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset--asset--search', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset--asset--search" onclick="tryItOut('GETacquisition-asset--asset--search');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset--asset--search" onclick="cancelTryOut('GETacquisition-asset--asset--search');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset--asset--search" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/{asset}/search</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-asset--asset--search" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/{asset}/ganp/search




> Example request:

```bash
curl -X GET \
    -G "http://localhost/acquisition/asset/iusto/ganp/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/iusto/ganp/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/acquisition/asset/quibusdam/search'" />

        <title>Redirecting to http://localhost/acquisition/asset/quibusdam/search</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/acquisition/asset/quibusdam/search">http://localhost/acquisition/asset/quibusdam/search</a>.
    </body>
</html>
```
<div id="execution-results-GETacquisition-asset--asset--ganp-search" hidden>
    <blockquote>Received response<span id="execution-response-status-GETacquisition-asset--asset--ganp-search"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETacquisition-asset--asset--ganp-search"></code></pre>
</div>
<div id="execution-error-GETacquisition-asset--asset--ganp-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETacquisition-asset--asset--ganp-search"></code></pre>
</div>
<form id="form-GETacquisition-asset--asset--ganp-search" data-method="GET" data-path="acquisition/asset/{asset}/ganp/search" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETacquisition-asset--asset--ganp-search', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETacquisition-asset--asset--ganp-search" onclick="tryItOut('GETacquisition-asset--asset--ganp-search');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETacquisition-asset--asset--ganp-search" onclick="cancelTryOut('GETacquisition-asset--asset--ganp-search');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETacquisition-asset--asset--ganp-search" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>acquisition/asset/{asset}/ganp/search</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="GETacquisition-asset--asset--ganp-search" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/{asset}/reap




> Example request:

```bash
curl -X POST \
    "http://localhost/acquisition/asset/sequi/reap" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/sequi/reap"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTacquisition-asset--asset--reap" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTacquisition-asset--asset--reap"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTacquisition-asset--asset--reap"></code></pre>
</div>
<div id="execution-error-POSTacquisition-asset--asset--reap" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacquisition-asset--asset--reap"></code></pre>
</div>
<form id="form-POSTacquisition-asset--asset--reap" data-method="POST" data-path="acquisition/asset/{asset}/reap" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTacquisition-asset--asset--reap', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTacquisition-asset--asset--reap" onclick="tryItOut('POSTacquisition-asset--asset--reap');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTacquisition-asset--asset--reap" onclick="cancelTryOut('POSTacquisition-asset--asset--reap');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTacquisition-asset--asset--reap" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>acquisition/asset/{asset}/reap</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="POSTacquisition-asset--asset--reap" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/asset/{asset}/ganp




> Example request:

```bash
curl -X POST \
    "http://localhost/acquisition/asset/omnis/ganp" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/asset/omnis/ganp"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTacquisition-asset--asset--ganp" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTacquisition-asset--asset--ganp"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTacquisition-asset--asset--ganp"></code></pre>
</div>
<div id="execution-error-POSTacquisition-asset--asset--ganp" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacquisition-asset--asset--ganp"></code></pre>
</div>
<form id="form-POSTacquisition-asset--asset--ganp" data-method="POST" data-path="acquisition/asset/{asset}/ganp" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTacquisition-asset--asset--ganp', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTacquisition-asset--asset--ganp" onclick="tryItOut('POSTacquisition-asset--asset--ganp');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTacquisition-asset--asset--ganp" onclick="cancelTryOut('POSTacquisition-asset--asset--ganp');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTacquisition-asset--asset--ganp" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>acquisition/asset/{asset}/ganp</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="POSTacquisition-asset--asset--ganp" data-component="url" required  hidden>
<br>

</p>
</form>


## acquisition/contact/reap/{sasset}




> Example request:

```bash
curl -X POST \
    "http://localhost/acquisition/contact/reap/dolorem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/acquisition/contact/reap/dolorem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTacquisition-contact-reap--sasset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTacquisition-contact-reap--sasset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTacquisition-contact-reap--sasset-"></code></pre>
</div>
<div id="execution-error-POSTacquisition-contact-reap--sasset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTacquisition-contact-reap--sasset-"></code></pre>
</div>
<form id="form-POSTacquisition-contact-reap--sasset-" data-method="POST" data-path="acquisition/contact/reap/{sasset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTacquisition-contact-reap--sasset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTacquisition-contact-reap--sasset-" onclick="tryItOut('POSTacquisition-contact-reap--sasset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTacquisition-contact-reap--sasset-" onclick="cancelTryOut('POSTacquisition-contact-reap--sasset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTacquisition-contact-reap--sasset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>acquisition/contact/reap/{sasset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>sasset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="sasset" data-endpoint="POSTacquisition-contact-reap--sasset-" data-component="url" required  hidden>
<br>

</p>
</form>


## Show the application&#039;s login form.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles --> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/assets/css/admin.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/app.js" defer></script>
</head>
<body>
    <div id="app">
        <main class="content">
            <div class="wd-f admin-login">
    <div class="py-4">
        <div class="gap-center-sm">
          <div class="form-log form-reg card">
              <div class="text-center">
                <div class="logo">
                    <div class="wrapper">
                        <img class="img img-responsive" src="http://localhost/assets/images/logo.png" alt="">
                    </div> 
                </div>
              </div>
                <div class="gap-header my-2">
                    <h3 class="text-center"><b>Admin Login</b></h3>
                    <span class="line-step mx-auto" style="width: 30%"></span>
                    
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="http://localhost/gapadmin/login">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q"> 
                        <div class="form-group">
                            
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block-sm btn-pry">Login </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
    
</body>
</html> 
```
<div id="execution-results-GETgapadmin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin"></code></pre>
</div>
<div id="execution-error-GETgapadmin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin"></code></pre>
</div>
<form id="form-GETgapadmin" data-method="GET" data-path="gapadmin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin" onclick="tryItOut('GETgapadmin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin" onclick="cancelTryOut('GETgapadmin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin</code></b>
</p>
</form>


## Show the application&#039;s login form.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyGaphub</title>
    <!-- CSRF Token -->
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles --> 
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link href="http://localhost/assets/css/animate.css" rel="stylesheet">
    <link href="http://localhost/assets/css/app.css" rel="stylesheet">
    <link href="http://localhost/assets/css/style.css" rel="stylesheet">
    <link href="http://localhost/assets/css/admin.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="http://localhost/assets/js/jquery.min.js"></script>
    <script src="http://localhost/assets/js/app.js" defer></script>
</head>
<body>
    <div id="app">
        <main class="content">
            <div class="wd-f admin-login">
    <div class="py-4">
        <div class="gap-center-sm">
          <div class="form-log form-reg card">
              <div class="text-center">
                <div class="logo">
                    <div class="wrapper">
                        <img class="img img-responsive" src="http://localhost/assets/images/logo.png" alt="">
                    </div> 
                </div>
              </div>
                <div class="gap-header my-2">
                    <h3 class="text-center"><b>Admin Login</b></h3>
                    <span class="line-step mx-auto" style="width: 30%"></span>
                    
                </div> 
                <div class="gap-body px-2">
                    <form method="POST" action="http://localhost/gapadmin/login">
                        <input type="hidden" name="_token" value="G6vEmf1to7quOTzrOLjcBBpm88FPF6Jz1vKgqo7q"> 
                        <div class="form-group">
                            
                            <div class="">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                                            </div>
                        </div>

                        <div class="form-group mb-5">
                            <div class="text-center">
                                <button type="submit" class="btn btn-block-sm btn-pry">Login </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </main>
    </div>
    
</body>
</html> 
```
<div id="execution-results-GETgapadmin-login" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-login"></code></pre>
</div>
<div id="execution-error-GETgapadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-login"></code></pre>
</div>
<form id="form-GETgapadmin-login" data-method="GET" data-path="gapadmin/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-login" onclick="tryItOut('GETgapadmin-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-login" onclick="cancelTryOut('GETgapadmin-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/login</code></b>
</p>
</form>


## gapadmin/register




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry 'admin@prismcheck.com' for key 'admins_email_unique' (SQL: insert into `admins` (`name`, `email`, `username`, `password`, `updated_at`, `created_at`) values (Gaphub, admin@prismcheck.com, prismcheck, $2y$10$Ak5fG3B2cxJxqETTQxZ.f.fKHpDR7x4psdzwvrK0A9ukz5ZzhLp7a, 2022-01-17 13:18:16, 2022-01-17 13:18:16))",
    "exception": "Illuminate\\Database\\QueryException",
    "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
    "line": 692,
    "trace": [
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 652,
            "function": "runQueryCallback",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 486,
            "function": "run",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php",
            "line": 438,
            "function": "statement",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php",
            "line": 32,
            "function": "insert",
            "class": "Illuminate\\Database\\Connection",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php",
            "line": 2964,
            "function": "processInsertGetId",
            "class": "Illuminate\\Database\\Query\\Processors\\Processor",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 1641,
            "function": "insertGetId",
            "class": "Illuminate\\Database\\Query\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1180,
            "function": "__call",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 1145,
            "function": "insertAndSetId",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 986,
            "function": "performInsert",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 884,
            "function": "save",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php",
            "line": 263,
            "function": "Illuminate\\Database\\Eloquent\\{closure}",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php",
            "line": 885,
            "function": "tap"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php",
            "line": 23,
            "function": "create",
            "class": "Illuminate\\Database\\Eloquent\\Builder",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 2091,
            "function": "forwardCallTo",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php",
            "line": 2103,
            "function": "__call",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Http\\Controllers\\AdminAuth\\RegisterController.php",
            "line": 93,
            "function": "__callStatic",
            "class": "Illuminate\\Database\\Eloquent\\Model",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "quickReg",
            "class": "App\\Http\\Controllers\\AdminAuth\\RegisterController",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 261,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 204,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\app\\Http\\Middleware\\RedirectIfAuthenticated.php",
            "line": 24,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "App\\Http\\Middleware\\RedirectIfAuthenticated",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 651,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 299,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 978,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 295,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\LENOVO\\Desktop\\Lab\\2021\\mygaphub\\new_release\\core\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETgapadmin-register" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-register"></code></pre>
</div>
<div id="execution-error-GETgapadmin-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-register"></code></pre>
</div>
<form id="form-GETgapadmin-register" data-method="GET" data-path="gapadmin/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-register" onclick="tryItOut('GETgapadmin-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-register" onclick="cancelTryOut('GETgapadmin-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/register</code></b>
</p>
</form>


## gapadmin/login




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-login"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-login"></code></pre>
</div>
<form id="form-POSTgapadmin-login" data-method="POST" data-path="gapadmin/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-login" onclick="tryItOut('POSTgapadmin-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-login" onclick="cancelTryOut('POSTgapadmin-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/login</code></b>
</p>
</form>


## gapadmin/logout




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-logout"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-logout"></code></pre>
</div>
<form id="form-POSTgapadmin-logout" data-method="POST" data-path="gapadmin/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-logout" onclick="tryItOut('POSTgapadmin-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-logout" onclick="cancelTryOut('POSTgapadmin-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/logout</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/dashboard"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-dashboard" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-dashboard"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-dashboard"></code></pre>
</div>
<div id="execution-error-GETgapadmin-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-dashboard"></code></pre>
</div>
<form id="form-GETgapadmin-dashboard" data-method="GET" data-path="gapadmin/dashboard" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-dashboard', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-dashboard" onclick="tryItOut('GETgapadmin-dashboard');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-dashboard" onclick="cancelTryOut('GETgapadmin-dashboard');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-dashboard" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/dashboard</code></b>
</p>
</form>


## gapadmin/reports




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-reports" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-reports"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-reports"></code></pre>
</div>
<div id="execution-error-GETgapadmin-reports" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-reports"></code></pre>
</div>
<form id="form-GETgapadmin-reports" data-method="GET" data-path="gapadmin/reports" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-reports', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-reports" onclick="tryItOut('GETgapadmin-reports');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-reports" onclick="cancelTryOut('GETgapadmin-reports');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-reports" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/reports</code></b>
</p>
</form>


## gapadmin/admins




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/admins" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/admins"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-admins" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-admins"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-admins"></code></pre>
</div>
<div id="execution-error-GETgapadmin-admins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-admins"></code></pre>
</div>
<form id="form-GETgapadmin-admins" data-method="GET" data-path="gapadmin/admins" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-admins', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-admins" onclick="tryItOut('GETgapadmin-admins');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-admins" onclick="cancelTryOut('GETgapadmin-admins');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-admins" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/admins</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-users"></code></pre>
</div>
<div id="execution-error-GETgapadmin-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-users"></code></pre>
</div>
<form id="form-GETgapadmin-users" data-method="GET" data-path="gapadmin/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-users" onclick="tryItOut('GETgapadmin-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-users" onclick="cancelTryOut('GETgapadmin-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/users</code></b>
</p>
</form>


## gapadmin/users/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/users/alias" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/users/alias"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-users--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-users--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-users--id-"></code></pre>
</div>
<div id="execution-error-GETgapadmin-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-users--id-"></code></pre>
</div>
<form id="form-GETgapadmin-users--id-" data-method="GET" data-path="gapadmin/users/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-users--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-users--id-" onclick="tryItOut('GETgapadmin-users--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-users--id-" onclick="cancelTryOut('GETgapadmin-users--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-users--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/users/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETgapadmin-users--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## gapadmin/preference/email




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/preference/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/preference/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-preference-email" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-preference-email"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-preference-email"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-preference-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-preference-email"></code></pre>
</div>
<form id="form-POSTgapadmin-preference-email" data-method="POST" data-path="gapadmin/preference/email" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-preference-email', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-preference-email" onclick="tryItOut('POSTgapadmin-preference-email');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-preference-email" onclick="cancelTryOut('POSTgapadmin-preference-email');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-preference-email" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/preference/email</code></b>
</p>
</form>


## gapadmin/preference/exchange




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/preference/exchange" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/preference/exchange"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-preference-exchange" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-preference-exchange"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-preference-exchange"></code></pre>
</div>
<div id="execution-error-GETgapadmin-preference-exchange" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-preference-exchange"></code></pre>
</div>
<form id="form-GETgapadmin-preference-exchange" data-method="GET" data-path="gapadmin/preference/exchange" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-preference-exchange', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-preference-exchange" onclick="tryItOut('GETgapadmin-preference-exchange');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-preference-exchange" onclick="cancelTryOut('GETgapadmin-preference-exchange');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-preference-exchange" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/preference/exchange</code></b>
</p>
</form>


## gapadmin/feedbacks




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/feedbacks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/feedbacks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-feedbacks" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-feedbacks"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-feedbacks"></code></pre>
</div>
<div id="execution-error-GETgapadmin-feedbacks" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-feedbacks"></code></pre>
</div>
<form id="form-GETgapadmin-feedbacks" data-method="GET" data-path="gapadmin/feedbacks" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-feedbacks', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-feedbacks" onclick="tryItOut('GETgapadmin-feedbacks');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-feedbacks" onclick="cancelTryOut('GETgapadmin-feedbacks');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-feedbacks" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/feedbacks</code></b>
</p>
</form>


## gapadmin/products




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/products" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/products"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-products" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-products"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-products"></code></pre>
</div>
<div id="execution-error-GETgapadmin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-products"></code></pre>
</div>
<form id="form-GETgapadmin-products" data-method="GET" data-path="gapadmin/products" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-products', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-products" onclick="tryItOut('GETgapadmin-products');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-products" onclick="cancelTryOut('GETgapadmin-products');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-products" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/products</code></b>
</p>
</form>


## gapadmin/products/{asset}




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/products/vitae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/products/vitae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-products--asset-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-products--asset-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-products--asset-"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-products--asset-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-products--asset-"></code></pre>
</div>
<form id="form-POSTgapadmin-products--asset-" data-method="POST" data-path="gapadmin/products/{asset}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-products--asset-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-products--asset-" onclick="tryItOut('POSTgapadmin-products--asset-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-products--asset-" onclick="cancelTryOut('POSTgapadmin-products--asset-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-products--asset-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/products/{asset}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>asset</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="asset" data-endpoint="POSTgapadmin-products--asset-" data-component="url" required  hidden>
<br>

</p>
</form>


## gapadmin/support




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/support" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/support"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-support" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-support"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-support"></code></pre>
</div>
<div id="execution-error-GETgapadmin-support" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-support"></code></pre>
</div>
<form id="form-GETgapadmin-support" data-method="GET" data-path="gapadmin/support" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-support', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-support" onclick="tryItOut('GETgapadmin-support');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-support" onclick="cancelTryOut('GETgapadmin-support');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-support" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/support</code></b>
</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/asset/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/asset/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-asset-type" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-asset-type"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-asset-type"></code></pre>
</div>
<div id="execution-error-GETgapadmin-asset-type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-asset-type"></code></pre>
</div>
<form id="form-GETgapadmin-asset-type" data-method="GET" data-path="gapadmin/asset/type" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-asset-type', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-asset-type" onclick="tryItOut('GETgapadmin-asset-type');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-asset-type" onclick="cancelTryOut('GETgapadmin-asset-type');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-asset-type" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/asset/type</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/asset/type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/asset/type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-asset-type" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-asset-type"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-asset-type"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-asset-type" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-asset-type"></code></pre>
</div>
<form id="form-POSTgapadmin-asset-type" data-method="POST" data-path="gapadmin/asset/type" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-asset-type', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-asset-type" onclick="tryItOut('POSTgapadmin-asset-type');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-asset-type" onclick="cancelTryOut('POSTgapadmin-asset-type');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-asset-type" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/asset/type</code></b>
</p>
</form>


## Display the specified resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/asset/type/dicta" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/asset/type/dicta"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-asset-type--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-asset-type--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-asset-type--id-"></code></pre>
</div>
<div id="execution-error-GETgapadmin-asset-type--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-asset-type--id-"></code></pre>
</div>
<form id="form-GETgapadmin-asset-type--id-" data-method="GET" data-path="gapadmin/asset/type/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-asset-type--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-asset-type--id-" onclick="tryItOut('GETgapadmin-asset-type--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-asset-type--id-" onclick="cancelTryOut('GETgapadmin-asset-type--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-asset-type--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/asset/type/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETgapadmin-asset-type--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/asset/type/praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/asset/type/praesentium"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-asset-type--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-asset-type--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-asset-type--id-"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-asset-type--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-asset-type--id-"></code></pre>
</div>
<form id="form-POSTgapadmin-asset-type--id-" data-method="POST" data-path="gapadmin/asset/type/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-asset-type--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-asset-type--id-" onclick="tryItOut('POSTgapadmin-asset-type--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-asset-type--id-" onclick="cancelTryOut('POSTgapadmin-asset-type--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-asset-type--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/asset/type/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTgapadmin-asset-type--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## Display a listing of the resource.




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/acqusition" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/acqusition"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-acqusition" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-acqusition"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-acqusition"></code></pre>
</div>
<div id="execution-error-GETgapadmin-acqusition" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-acqusition"></code></pre>
</div>
<form id="form-GETgapadmin-acqusition" data-method="GET" data-path="gapadmin/acqusition" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-acqusition', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-acqusition" onclick="tryItOut('GETgapadmin-acqusition');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-acqusition" onclick="cancelTryOut('GETgapadmin-acqusition');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-acqusition" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/acqusition</code></b>
</p>
</form>


## gapadmin/acqusition/{braid}




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/acqusition/fugit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/acqusition/fugit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-acqusition--braid-" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-acqusition--braid-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-acqusition--braid-"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-acqusition--braid-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-acqusition--braid-"></code></pre>
</div>
<form id="form-POSTgapadmin-acqusition--braid-" data-method="POST" data-path="gapadmin/acqusition/{braid}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-acqusition--braid-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-acqusition--braid-" onclick="tryItOut('POSTgapadmin-acqusition--braid-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-acqusition--braid-" onclick="cancelTryOut('POSTgapadmin-acqusition--braid-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-acqusition--braid-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/acqusition/{braid}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>braid</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="braid" data-endpoint="POSTgapadmin-acqusition--braid-" data-component="url" required  hidden>
<br>

</p>
</form>


## gapadmin/emails




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/emails" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/emails"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-emails" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-emails"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-emails"></code></pre>
</div>
<div id="execution-error-GETgapadmin-emails" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-emails"></code></pre>
</div>
<form id="form-GETgapadmin-emails" data-method="GET" data-path="gapadmin/emails" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-emails', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-emails" onclick="tryItOut('GETgapadmin-emails');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-emails" onclick="cancelTryOut('GETgapadmin-emails');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-emails" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/emails</code></b>
</p>
</form>


## gapadmin/emails/welcome




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/emails/welcome" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/emails/welcome"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-emails-welcome" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-emails-welcome"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-emails-welcome"></code></pre>
</div>
<div id="execution-error-GETgapadmin-emails-welcome" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-emails-welcome"></code></pre>
</div>
<form id="form-GETgapadmin-emails-welcome" data-method="GET" data-path="gapadmin/emails/welcome" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-emails-welcome', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-emails-welcome" onclick="tryItOut('GETgapadmin-emails-welcome');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-emails-welcome" onclick="cancelTryOut('GETgapadmin-emails-welcome');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-emails-welcome" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/emails/welcome</code></b>
</p>
</form>


## gapadmin/emails/recommendation




> Example request:

```bash
curl -X GET \
    -G "http://localhost/gapadmin/emails/recommendation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/emails/recommendation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost/gapadmin'" />

        <title>Redirecting to http://localhost/gapadmin</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost/gapadmin">http://localhost/gapadmin</a>.
    </body>
</html>
```
<div id="execution-results-GETgapadmin-emails-recommendation" hidden>
    <blockquote>Received response<span id="execution-response-status-GETgapadmin-emails-recommendation"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETgapadmin-emails-recommendation"></code></pre>
</div>
<div id="execution-error-GETgapadmin-emails-recommendation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETgapadmin-emails-recommendation"></code></pre>
</div>
<form id="form-GETgapadmin-emails-recommendation" data-method="GET" data-path="gapadmin/emails/recommendation" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETgapadmin-emails-recommendation', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETgapadmin-emails-recommendation" onclick="tryItOut('GETgapadmin-emails-recommendation');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETgapadmin-emails-recommendation" onclick="cancelTryOut('GETgapadmin-emails-recommendation');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETgapadmin-emails-recommendation" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>gapadmin/emails/recommendation</code></b>
</p>
</form>


## Store a newly created resource in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost/gapadmin/emails" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/gapadmin/emails"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTgapadmin-emails" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTgapadmin-emails"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTgapadmin-emails"></code></pre>
</div>
<div id="execution-error-POSTgapadmin-emails" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTgapadmin-emails"></code></pre>
</div>
<form id="form-POSTgapadmin-emails" data-method="POST" data-path="gapadmin/emails" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTgapadmin-emails', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTgapadmin-emails" onclick="tryItOut('POSTgapadmin-emails');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTgapadmin-emails" onclick="cancelTryOut('POSTgapadmin-emails');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTgapadmin-emails" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>gapadmin/emails</code></b>
</p>
</form>



