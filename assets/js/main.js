$(document).ready(function () {
  $('.message a').click(function () {
    $('form').animate(
      {
        height: 'toggle',
        opacity: 'toggle',
      },
      'slow'
    )
  })

  $('.login-form').submit(function (event) {
    event.preventDefault() // Prevent the default form submission

    // Get the username and password entered by the user
    var username = $('.login-form input[type="text"]').val()
    var password = $('.login-form input[type="password"]').val()

    // Dummy authentication logic (replace with your actual authentication logic)
    if (username === 'Mrunmayi' && password === 'Mrunmayi12345') {
      // If authentication is successful, animate and redirect to the home screen
      $('.login-form').fadeOut('slow', function () {
        window.location.href = 'home2.php' // Redirect to home2.html
      })
    } else {
      alert('Invalid username or password. Please try again.')
    }
  })
})
