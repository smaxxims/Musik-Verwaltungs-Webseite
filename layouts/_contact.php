<div class="container2">
    <h1>Kontakt</h1><br>
    <form action="../views/contact.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label>Nachricht</label>
            <textarea name="message" cols="30" rows="10" class="form-control" placeholder="Nachricht" required></textarea>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Senden</button>
    </form>
</div>