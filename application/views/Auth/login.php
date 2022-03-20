<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2019.2.619/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2022.1.301/styles/kendo.default-main.min.css" />

    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/jquery.min.js"></script>
    
    
    <script src="https://kendo.cdn.telerik.com/2022.1.301/js/kendo.all.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <?php
        require_once'public/lib/Kendo/Autoload.php';
    ?>
    <title>Codeigniter Training</title>
</head>
<body>





<!-- Section 1 -->
<section class="w-full px-8 py-16 bg-gray-100 xl:px-8">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">

            <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                <p class="font-medium text-blue-500 uppercase">Building Businesses</p>
                <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                    Changing The Way People Do Business.
                </h2>
                <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them about your mission. We're revolutionizing the way customers and businesses interact.</p>
            </div>


                <div class="w-full mt-16 md:mt-0 md:w-2/5">
                    <?php if ($this->session->flashdata('status')): ?>
                        <div class="alert alert-success">
                            <?=$this->session->flashdata('status');?>
                        </div>
                    <?php endif;?>
                <form action="<?php echo base_url(); ?>User/UserController/loginAuth" method="post">

                    <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                        <h3 class="mb-6 text-2xl font-medium text-center">Sign in to your Account</h3>

                        <!-- <?php
                            $calendar = new \Kendo\UI\Calendar('MyCalendar');
                            echo $calendar->render();
                        ?> -->
                        
                        <!-- <?php
                            $data = array(
                                array('name' => 'John Doe', 'age' => 32),
                                array('name' => 'Jane Doe', 'age' => 29),
                                array('name' => 'John Doe', 'age' => 32),
                                array('name' => 'Jane Doe', 'age' => 29)
                            );
                             $dataSource = new \Kendo\Data\DataSource();
                             $dataSource->data($data);
                              $nameColumn = new \Kendo\UI\GridColumn();
    $nameColumn->field('name');

    $ageColumn = new \Kendo\UI\GridColumn();
    $ageColumn->field('age');

    $grid = new \Kendo\UI\Grid('grid');
    $grid->addColumn($nameColumn, $ageColumn)
         ->dataSource($dataSource);
         echo $grid->render();
                        ?>
                         -->
                       
                        <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Email address">
                        <small><?php echo form_error('email'); ?></small>
                        <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" placeholder="Password">
                        <small><?php echo form_error('password'); ?></small>

                        <div class="block">
                            <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">Log Me In</button>
                        </div>
                        <p class="w-full mt-4 text-sm text-center text-gray-500">Don't have an account? <a href="#_" class="text-blue-500 underline">Sign up here</a></p>
                    </div>
                    </form>

                </div>
        </div>
    </div>
</section>

</body>
</html>
 <!-- <div id="example">
    <div class="demo-section k-content">
        <div id="validation-success"></div>

        <form id="exampleform" ></form>
    </div>

    <script>
        $(document).ready(function () {
            var validationSuccess = $("#validation-success");

            $("#exampleform").kendoForm({
                orientation: "vertical",
                formData: {
                    Username: "johny",
                    Email: "john.doe@email.com",
                    Password: "pass123",
                    Birth: new Date(),
                    Agree: false
                },
                items: [{
                    type: "group",
                    label: "Login Form",
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
                       
                       
                    ]
                }],
                validateField: function(e) {
                    validationSuccess.html("");
                },
                submit: function(e) {
                    e.preventDefault();
                    validationSuccess.html("<div class='k-messagebox k-messagebox-success'>Form data is valid!</div>");
                },
                clear: function(ev) {
                    validationSuccess.html("");
                }
            });
        });
    </script>
</div> -->

