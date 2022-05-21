$(document).ready(function () {
   $('#logout-button').on('click', function (e) {
       e.preventDefault();
       $('#logout-form').submit();
   })
});
