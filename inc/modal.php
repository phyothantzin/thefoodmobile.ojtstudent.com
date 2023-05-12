<div class="modal fade" id="BookingModal" tabindex="-1" aria-labelledby="BookingModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="mb-0">Registration Form</h3>
                        <a href="login.php" class="btn btn-primary mx-4 w-48">Login</a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger m-4">
                            <?php foreach ($errors as $error): ?>
                                <div><?php echo $error; ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="modal-body d-flex flex-column justify-content-center">
                        <div class="booking">
                            
                            <form class="booking-form row" role="form" action="index.php" method="post">
                                <div class="col-lg-6 col-12">
                                    <label for="name" class="form-label">Full Name</label>

                                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="telephone" name="phone" id="phone"  class="form-control" placeholder="123-456-7890">
                                    <!-- pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" -->
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>

                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="your@email.com" required>
                                </div>


                                <div class="col-lg-6 col-12">
                                    <label for="password" class="form-label">Password</label>

                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your password to login" minlength="9" required>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <label for="confirm-password" class="form-label">Confirm Password</label>

                                    <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Re-enter your password" minlength="9" required>
                                </div>

                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>

                                    <textarea class="form-control" rows="4" id="address" name="address" placeholder="Your address for delivery"></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="credit" class="form-label">Credit Card No</label>
                                    <input type="text" name="credit" id="credit" class="form-control" placeholder="Your Payment">
                                </div>

                                <div class="col-lg-4 col-12 ms-auto">
                                    <button type="submit" class="form-control">Submit Request</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="modal-footer"></div>
                    
                </div>
                
            </div>
        </div>