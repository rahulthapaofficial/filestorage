<?php include('common/header.php') ?>

<div class="wrapper">
    <?php include('common/sidebar.php') ?>
    <?php include('common/navbar.php') ?>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="pricing-custom-tab w-100">
                    <div class="pricing-content">
                        <div class="row m-0">
                            <?php
                            foreach (getActivePlans() as $key => $plan) : ?>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="card card-block card-stretch card-height blog pricing-details">
                                        <div class="card-body border text-center rounded">
                                            <div class="pricing-header">
                                                <div class="icon-data"><i class="ri-star-line"></i>
                                                </div>
                                                <h5 class="mb-4 display-5 font-weight-bolder">
                                                    <?php if ($plan['price']) : ?>
                                                        NPR <?php echo $plan['price'] ?><small class="font-size-14 text-muted">/ <?php echo $plan['duration'] ?></small>
                                                    <?php else : ?>
                                                        <?php echo $plan['duration'] ?></small>
                                                    <?php endif; ?>
                                                </h5>
                                            </div>
                                            <h4 class="mb-3"><?php echo $plan['name'] ?></h4>
                                            <ul class="list-unstyled mb-0 pricing-list">
                                                <li><i class="lar la-check-circle text-primary mr-2 font-size-20"></i><?php echo $plan['storage_size'] ?></li>
                                                <?php if ($plan['price']) : ?>
                                                <?php endif; ?>
                                            </ul>
                                            <?php if ($plan['is_subscribed']) :
                                                if ($plan['is_subscription_active']) : ?>
                                                    <button id="currentPlan" class="btn btn-outline-secondary mt-5">Current Plan</button>
                                                    <?php
                                                    if ($plan['can_unsubscribe']) : ?>
                                                        <a href="<?php echo BASE_URL . 'action/plans/unsubscribe.php?packageId=' . $plan['id'] ?>" class="btn btn-danger mt-5">Unsubscribe</a>
                                                    <?php endif;
                                                else : ?>
                                                    <button id="currentPlan" class="btn btn-outline-secondary mt-5">Default Plan</button>
                                                <?php endif;
                                            else : ?>
                                                <button onclick="makePayment(<?php echo $plan['id'] . ',' . $plan['price'] ?>)" data-packageid="<?php echo $plan['id'] ?>" class="btn btn-primary mt-5">Subscribe Now</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('common/footer.php') ?>