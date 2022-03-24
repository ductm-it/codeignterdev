<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.default-main.min.css" />

    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/jquery.min.js"></script>
    
    
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>public/js/kendo.all.min.js"></script>
    <?php
        require_once'public/lib/Kendo/Autoload.php';
    ?>    
    <title>Codeigniter Training</title>
</head>
<body>

<!-- Section 1 -->
<section class="w-full bg-white">

<div class="mx-auto max-w-7xl">
    <div class="flex flex-col lg:flex-row">
        <div class="relative w-full bg-cover lg:w-6/12 xl:w-7/12 bg-gradient-to-r from-white via-white to-gray-100">
            <div class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0">
                <div class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl">
                    <div class="relative">
                        <p class="mb-2 font-medium text-gray-700 uppercase">Work smarter</p>
                        <h2 class="text-5xl font-bold text-gray-900 xl:text-6xl">Features to help you work smarter</h2>
                    </div>
                    <p class="text-2xl text-gray-700">We've created a simple formula to follow in order to gain more out of your business and your application.</p>
                    <a href="#_" class="inline-block px-8 py-5 text-xl font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Get Started Today</a>
                </div>
            </div>
        </div>

        <div class="w-full bg-white lg:w-6/12 xl:w-5/12">
            <div class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16 xl:p-24">
                <!-- <h4 class="w-full text-3xl font-bold">Signup</h4> -->
                <?php if ($this->session->flashdata('status')): ?>
                    <div class="alert alert-success">
                        <?=$this->session->flashdata('status');?>
                    </div>
                <?php endif;?>


                <form method="post" id="register_form" action="<?php echo base_url() ?>User/UserController/store">
                        <div class="relative w-full mt-10 space-y-3">
                           <?php echo validation_errors(); ?>
						    <?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?>
                        </div>
               </form> 
              

                <script>
                    $(document).ready(function () {
                        var validationSuccess = $("#validation-success");

                        $("#register_form").kendoForm({
                            orientation: "vertical",
                            formData: {
                                Email: "<?php echo set_value('Email') ?>",
                                Password: "",
                                PasswordConfirm: "",
                                Name: "<?php echo set_value('Name') ?>",
                                Job: "<?php set_value('Job') ?>",
                                Sex: "<?php set_value('Sex') ?>",
                            },
                            items: [{
                                type: "group",
                                label: "Registration Form",
                                items: [
                                    { field: "Email", label: "Email:", validation: { required: true, email: true } },
                                    {
                                        field: "Password",
                                        label: "Password:",
                                        validation: { required: true },
                                        editor: function (container, options) {
                                            $('<input type="password" id="Password" name="' + options.field + '" title="Password" required="required" autocomplete="off" aria-labelledby="Password-form-label" data-bind="value: Password" aria-describedby="Password-form-hint"/>')
                                                .appendTo(container)
                                                .kendoTextBox();
                                        }
                                    },
                                    {
                                        field: "ConfirmPassword",
                                        label: "ConfirmPassword:",
                                        validation: { required: true },
                                        editor: function (container, options) {
                                            $('<input type="password" id="ConfirmPassword" name="' + options.field + '" title="Confirm Password" required="required" autocomplete="off" aria-labelledby="Password-form-label" data-bind="value: Password" aria-describedby="Password-form-hint"/>')
                                                .appendTo(container)
                                                .kendoTextBox();
                                        }
                                    },
                                    { field: "Name", label: "Name:", validation: { required: true } },
                                    { field: "Sex", label: "Sex:", validation: { required: true } },
                                    { field: "Age", label: "Age:", validation: { required: true } },
                                    { field: "Job", label: "Job:", validation: { required: true } }

                                ]
                            }],
                            validateField: function(e) {
                                validationSuccess.html("");
                            },
                           submit: function(e) {
                                e.preventDefault();
                                submit();
                            },
                            clear: function(ev) {
                                validationSuccess.html("");
                            }
                        });
                    });
                </script>

               <!-- <form method="post" action="<?php echo base_url() ?>User/UserController/store">
                    <p class="text-lg text-gray-500">or, if you have an account you can <a href="#_" class="text-blue-600 underline">sign in</a></p>
                        <div class="relative w-full mt-10 space-y-3">
                            <div class="relative">
                                <label class="font-medium text-gray-900">Email</label>
                                <input type="text" name="email" value="<?php echo set_value('email'); ?>"  class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Enter Your Email Address">
                                <small><?php echo form_error('email'); ?></small>
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Password</label>
                                <input type="password" name="password"  class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Password">
                                <small><?php echo form_error('password'); ?></small>
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Confirm Password</label>
                                <input type="password" name="confirmpassword" value="<?php echo set_value('confirmpassword'); ?>" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Password">
                                <small><?php echo form_error('confirmpassword'); ?></small>
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Name</label>
                                <input type="text" name="name" value="<?php echo set_value('name'); ?>" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Enter Your Name">
                                <small><?php echo form_error('name'); ?></small>
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Gender</label>
                                <input type="text" name="sex" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Enter Your Sex">
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Age</label>
                                <input type="text" name="age" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Enter Your Age">
                            </div>
                            <div class="relative">
                                <label class="font-medium text-gray-900">Job</label>
                                <input type="text" name="job" class="block w-full px-4 py-4 mt-2 text-xl placeholder-gray-400 bg-gray-200 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-600 focus:ring-opacity-50" placeholder="Enter Your Job">
                            </div>
                            <div class="relative">
                                <button type="submit" class="inline-block w-full px-5 py-4 mt-3 text-lg font-bold text-center text-gray-900 transition duration-200 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 ease">Allow Get Location</button>
                                <button type="submit" class="inline-block w-full px-5 py-4 text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease">Signup</button>
                            </div>
                        </div>
               </form> -->

            </div>
        </div>
    </div>
</div>
