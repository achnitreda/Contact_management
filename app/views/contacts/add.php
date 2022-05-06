<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
<div class="col-6 m-auto">
<a href="<?php echo URLROOT; ?>/contacts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-2">
    <h2>Add contact</h2>
    <p>Create a contact with this form</p>
    <form action="<?php echo URLROOT; ?>/contacts/add" method="post">
      <div class="form-group">
        <label for="names">Name: <sup>*</sup></label>
        <input type="text" name="names" class="form-control form-control-lg <?php echo (!empty($data['names_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['names']; ?>">
        <span class="invalid-feedback"><?php echo $data['names_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="emails">email: <sup>*</sup></label>
        <input type="email" name="emails" class="form-control form-control-lg <?php echo (!empty($data['emails_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['emails']; ?>">
        <span class="invalid-feedback"><?php echo $data['emails_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="phone">Phone: <sup>*</sup></label>
        <input type="text" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>">
        <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="address">Address: <sup>*</sup></label>
        <textarea name="address" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['address']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['address_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success mt-1" value="Submit">
    </form>
  </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>