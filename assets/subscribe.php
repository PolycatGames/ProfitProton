<section class="subscribe">
    <h1 class="subscribe-title">Enjoy our content?</h1>
    <p class="subscribe-description">Sign up for our newsletter and stay up to date with the latest side-hustles!</p>
    <form class="subscribe-sect" method="post" name="submit-to-google-sheet">
        <input class="subscribe-input" autocomplete="email" type="text" name="Email" placeholder="Enter your email" required>
        <button class="subscribe-button" type="submit">Subscribe</button>
    </form>
    <div class="success" style="display: block;">Thanks for subscribing!</div>
    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbwxyoNzcKAiXGGTB-e9zgGu_v7atgUJXWpQEL7GImsFfWoDiFXOLeW07DmBCmt29ZS62w/exec'
        const form = document.forms['submit-to-google-sheet']
        const inputElement = form.elements['Email']
        const successElement = document.querySelector('.success')

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => {
                    console.log('Success!', response)
                    inputElement.value = '' // Reset the input value to an empty string
                    successElement.style.visibility = 'visible' // Make the success visible
                })
                .catch(error => console.error('Error!', error.message))
        })
    </script>
</section>