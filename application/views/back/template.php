<?php $this->load->view('back/template/meta'); ?>
<div class="wrapper">

    <?php $this->load->view('back/template/header'); ?>
    <?php $this->load->view('back/template/sidebar'); ?>
    <script src="<?= base_url() ?>assets/back/plugins/jquery/jquery.min.js"></script>
    <?php echo $contents; ?>
</div>
<?php $this->load->view('back/template/script'); ?>