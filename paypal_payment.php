<head>
  <meta charset="utf-8">
  <script src="https://js.braintreegateway.com/web/dropin/1.25.0/js/dropin.min.js"></script>
</head>
<body>
  <!-- Step one: add an empty container to your page -->
  <div id="dropin-container"></div>

<script type="text/javascript">

// Step two: create a dropin instance using that container (or a string
//   that functions as a query selector such as `#dropin-container`)
braintree.dropin.create({
container: document.getElementById('dropin-container'),
// ...plus remaining configuration
}, (error, dropinInstance) => {
// Use `dropinInstance` here
// Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
});

</script>
</body>