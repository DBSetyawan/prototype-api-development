<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{config('l5-swagger.api.title')}}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:300,600|Titillium+Web:400,600,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ l5_swagger_asset('swagger-ui.css') }}" >
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-32x32.png') }}" sizes="32x32" />
  <link rel="icon" type="image/png" href="{{ l5_swagger_asset('favicon-16x16.png') }}" sizes="16x16" />
  <style>
    html
    {
        box-sizing: border-box;
        overflow: -moz-scrollbars-vertical;
        overflow-y: scroll;
    }
    *,
    *:before,
    *:after
    {
        box-sizing: inherit;
    }

    body {
      margin:0;
      background: #fafafa;
    }
  </style>
</head>

<body>
<div id="swagger-ui"></div>

<script src="{{ l5_swagger_asset('swagger-ui-bundle.js') }}"> </script>
<script src="{{ l5_swagger_asset('swagger-ui-standalone-preset.js') }}"> </script>
<script>
window.onload = function() {
  var urlToDocs = @json($urlToDocs);
  var passwordClient = @json(\Laravel\Passport\Client::where('password_client', 1)->whereNull('user_id')->first());
  // Build a system
  const ui = SwaggerUIBundle({
    dom_id: '#swagger-ui',

    url: urlToDocs,
    operationsSorter: {!! isset($operationsSorter) ? '"' . $operationsSorter . '"' : 'null' !!},
    configUrl: {!! isset($additionalConfigUrl) ? '"' . $additionalConfigUrl . '"' : 'null' !!},
    validatorUrl: {!! isset($validatorUrl) ? '"' . $validatorUrl . '"' : 'null' !!},
    oauth2RedirectUrl: "{{ route('l5-swagger.oauth2_callback') }}",

    requestInterceptor: function(request) {
      request.headers['X-CSRF-TOKEN'] = @json(csrf_token());
      request.headers['Authorization'] = 'Bearer ' + '{{ Cookie::get("token") }}'
      return request;
    },

    responseInterceptor: function (response) {
        if (response.status >= 200 && response.status < 300) {
            var docsUrl = @json(config('l5-swagger.paths.docs_json'));
            var storageKeys = Object.keys(window.localStorage);

            if (response.url.indexOf(urlToDocs) < 0 && storageKeys.indexOf('token') < 0 && response.obj) {
              window.localStorage.setItem('token', JSON.stringify(response.obj));
            }
        }
        return response;
    },

    presets: [
      SwaggerUIBundle.presets.apis,
      SwaggerUIStandalonePreset
    ],

    plugins: [
      SwaggerUIBundle.plugins.DownloadUrl
    ],

    layout: "StandaloneLayout"
  });

  if (passwordClient) {
    ui.initOAuth({
      clientId: passwordClient.id,
      clientSecret: passwordClient.secret,
    });
  }

  var tokenData = window.localStorage.getItem('token');
  var token = null;
  if (tokenData) {
      try {
          token = JSON.parse(tokenData);
      } catch(e) {

      }
  }

  if (token) {
      ui.authActions.preAuthorizeImplicit({
          auth: {
              schema: {
                  flow: 'password',
                  get: function (key) {
                      return this[key];
                  }
              },
              name: 'passport'
          },
          token: token,
          isValid: true
      });
  }

  window.ui = ui
}
</script>
</body>

</html>
