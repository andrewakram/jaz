@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content login-form">

        <!-- Section content -->
        <div class="wt-contact-wrap row equal-wraper">

            <!-- MAP BLOCK START -->

            <!-- MAP BLOCK END -->

            <!-- RIGHT PART START -->
            <div class="section-full p-t80 p-b50">

                <!-- CONTACT DETAIL -->


                <!-- CONTACT FORM -->

                <div class="m-a30 wt-box border-2">

                    <form class="cons-contact-form wow zoomIn" method="post">

                        <div class="wrapper fadeInDown">

                            <div id="formContent">
                                <!-- Tabs Titles -->

                                <!-- Icon -->
                                <div class="fadeIn first">

                                    <h4 class="text-uppercase login-text2">Provider service </h4>
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview" style="background-image: url({{asset('jaz/images/man.png')}});">
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!-- Login Form -->
                                <form>
                                    <select id="myselection">
                                        <option>Select provide type </option>
                                        <option value="One">user</option>
                                        <option value="Two">Company</option>

                                    </select>


                                    <div id="showThree" class="myDiv">
                                        You have selected option <strong>"Three"</strong>.
                                    </div>
                                    <input type="text" id="login " class="fadeIn second" name="login" placeholder=" Name">
                                    <input type="text" id="password" class="fadeIn third" name="login" placeholder="Email">
                                    <input type="text" id="password" class="fadeIn third" name="login" placeholder="Password">
                                    <input type="text" id="password" class="fadeIn third" name="login" placeholder="Phone Number">
                                    <select id="myselection2">
                                        <option>Service </option>
                                        <option value="One">user</option>
                                        <option value="Two">Company</option>

                                    </select>
                                    <div id="showOne" class="myDiv">
                                        <input type="text" id="login " class="fadeIn " name="login" placeholder="ID">
                                    </div>
                                    <div id="showTwo" class="myDiv">
                                        <input type="text" id="login " class="fadeIn " name="login" placeholder="Tax Number">
                                        <div class="image-upload fadeIn">

                                            <p class="Commercial">Upload Commercial Register </p>
                                            <label for="file-input">
                                                <img src="{{asset('jaz/images/upload.png')}}" class="upload-co">
                                            </label>


                                            <input id="file-input" type="file" />
                                        </div>

                                    </div>

                                    <input type="submit" class="fadeIn fourth" value="Register">

                                </form>


                            </div>
                        </div>


                    </form>

                </div>

            </div>
            <!-- RIGHT PART END -->

        </div>
        <!-- Section content END -->

    </div>
    <!-- CONTENT END -->

@endsection
