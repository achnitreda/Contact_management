<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row">
  <?php flash('contact_message'); ?>
    <div class="col-md-10 col-6">
      <h1>Contacts</h1>
    </div>
    <div class="col-md-2 col-6">
      <a href="<?php echo URLROOT; ?>/contacts/add" class="btn btn-primary">
      <i class="fa-solid fa-pencil"></i> Add Contact
      </a>
    </div>
  </div>
  <div class="row">
      <?php foreach($data['contacts'] as $contact) : ?>
        <div class="flex col-md-4 col-sm-6 ">
          <?php if($contact->user_id == $_SESSION['user_id']) {?>
            <div class="card card-body mb-3">
              <h4><?php echo $contact->names; ?></h4>
              <div><p>Email: <?php echo $contact->emails; ?></p></div>
              <div><p>Phone: <?php echo $contact->phone; ?></p></div>
              <div><p>Address: <?php echo $contact->address; ?></p></div>
              <div class="bg-light p-2 mb-3">
                  Created at <?php echo $contact->contactCreated; ?>
              </div>
              <div class="row">
                <a href="<?php echo URLROOT; ?>/contacts/edit/<?php echo $contact->contactId; ?>" class="col-2 btn btn-dark">Edit</a>
                <form class="col-2" action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $contact->contactId; ?>" method="post">
                  <input type="submit" value="Delete" class=" btn btn-danger">
                </form>
              </div>
            </div>
        </div>
       <?php } endforeach;?>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>