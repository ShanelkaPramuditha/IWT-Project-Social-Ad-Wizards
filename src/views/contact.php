<form action="./src/config/form/contact-action.php" method="POST">
  <div class="container">
    <h3>Contact Us</h3>
  
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name.." required>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email.." required>

    <label for="subject">Message</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:100px" required></textarea>

    <button class="contact-button" type="submit">Submit</button>
  </div>
</form>
