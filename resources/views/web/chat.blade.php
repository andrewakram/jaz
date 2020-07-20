@extends('web.index')
@section('content')

    <!-- CONTENT START -->
    <div class="page-content">

        <!-- INNER PAGE BANNER -->


        <!-- SECTION CONTENT START -->
        <div class="section-full ">
            <div class="container-fluid nomargin ">
                <div id="frame">

                    <div id="sidepanel">


                        <div id="contacts">
                            <ul>
                                @if(sizeof($newChat)<1)
                                @foreach($newChat as $new)
                                <li class="contact clickable testable"  worker="{{$new->worker_id}}" id="{{$new->worker_id}}" order="{{$order_id}}">
                                    <div class="wrap">

                                        @if($new->image)
                                            <img src="{{asset("/public/workers/images/".$new->image)}}" alt="" />
                                        @else
                                            <img src="{{asset("/jaz/images/logo-12.png")}}" alt="" />
                                        @endif
                                        <div class="meta">
                                            <p class="name">{{$new->name}}</p>
                                            <p class="preview">
                                                <span style="color: red"  class="{{$new->worker_id}}  hidden">
                                                        New messages . . .
                                                    </span>
                                                @if(Session::get('lang') == "en")
                                                    <span style="color: red" >
                                                        Start chat . . .
                                                    </span>
                                                @else
                                                    <span style="color: red" >
                                                        ابدأ المحادثة . . .
                                                    </span>
                                                @endif
                                                
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                                @foreach($chatList as $list)
                                <li class="contact clickable testable"  worker="{{$list->worker_id}}" id="{{$list->worker_id}}" order="{{$list->order_id}}">
                                    <div class="wrap">

                                        @if($list->image)
                                            <img src="{{asset("/public/workers/images/".$list->image)}}" alt="" />
                                        @else
                                            <img src="{{asset("/jaz/images/logo-12.png")}}" alt="" />
                                        @endif
                                        <div class="meta">
                                            <p class="name">{{$list->name}}</p>
                                            <p class="preview">
                                                <span style="color: red"  class="{{$list->worker_id}}  hidden">
                                                        New messages . . .
                                                    </span>
                                                @if($list->is_read == 0)
                                                    <span style="color: red" >
                                                        New messages . . .
                                                    </span>
                                                @else
                                                    {{$list->body}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                {{--
                                <li class="contact clickable ">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                        <div class="meta">
                                            <p class="name chat-person-name">Harvey Specter</p>
                                            <p class="preview">Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact active clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Rachel Zane</p>
                                            <p class="preview">I was thinking that we could have chicken tonight, sounds good?</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Donna Paulsen</p>
                                            <p class="preview">Mike, I know everything! I'm Donna..</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Jessica Pearson</p>
                                            <p class="preview">Have you finished the draft on the Hinsenburg deal?</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Harold Gunderson</p>
                                            <p class="preview">Thanks Mike! :)</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Daniel Hardman</p>
                                            <p class="preview">We'll meet again, Mike. Tell Jessica I said 'Hi'.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Katrina Bennett</p>
                                            <p class="preview">I've sent you the files for the Garrett trial.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Charles Forstman</p>
                                            <p class="preview">Mike, this isn't over.</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="contact clickable">
                                    <div class="wrap">

                                        <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                        <div class="meta">
                                            <p class="name">Jonathan Sidwell</p>
                                            <p class="preview"><span>You:</span> That's bullshit. This deal is solid.</p>
                                        </div>
                                    </div>
                                </li>
                                --}}
                            </ul>
                        </div>

                    </div>

                    <div class="content">
                        <div class="contact-profile">
                            <img src="{{Session::get('u_image')}}" alt="" />
                            <!--<img src="{{asset('public/users/images/default.png')}}" alt="" />-->
                            <p id="person-name">{{Session::get('u_name')}}</p>

                        </div>
                        <span class="asd"></span>
                        <div class="messages">
                            <ul></ul>
                            {{--<ul class="messages-body">
                                <li class="sent">
                                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                    <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                                </li>
                                <li class="replies">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <p>When you're backed against the wall, break the god damn thing down.</p>
                                </li>
                                <li class="replies">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <p>Excuses don't win championships.</p>
                                </li>
                                <li class="sent">
                                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                    <p>Oh yeah, did Michael Jordan tell you that?</p>
                                </li>
                                <li class="replies">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <p>No, I told him that.</p>
                                </li>
                                <li class="replies">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <p>What are your choices when someone puts a gun to your head?</p>
                                </li>
                                <li class="sent">
                                    <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                    <p>What are you talking about? You do what they say or they shoot you.</p>
                                </li>
                                <li class="replies">
                                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                    <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                                </li>
                            </ul>--}}
                        </div>
                        <div class="message-input">
                            <div class="wrap">

                                <input type="text" id="insertedMessage" style="margin-bottom: -45px;" placeholder="Write your message..." />

                                <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" id="myMessage" />
        <!-- SECTION CONTENT END -->

    </div>
    <!-- CONTENT END -->




@endsection

@section('chatScriptCode')
<script>
    var order;
    var message;
</script>

    {{--//////////////////////////////////////////////////////////////////////////////////--}}
    <script >
        $(".messages").animate({ scrollTop: $(document).height() }, "fast");

        $("#profile-img").click(function() {
            $("#status-options").toggleClass("active");
        });

        $(".expand-button").click(function() {
            $("#profile").toggleClass("expanded");
            $("#contacts").toggleClass("expanded");
        });

        $("#status-options ul li").click(function() {
            $("#profile-img").removeClass();
            $("#status-online").removeClass("active");
            $("#status-away").removeClass("active");
            $("#status-busy").removeClass("active");
            $("#status-offline").removeClass("active");
            $(this).addClass("active");

            if($("#status-online").hasClass("active")) {
                $("#profile-img").addClass("online");
            } else if ($("#status-away").hasClass("active")) {
                $("#profile-img").addClass("away");
            } else if ($("#status-busy").hasClass("active")) {
                $("#profile-img").addClass("busy");
            } else if ($("#status-offline").hasClass("active")) {
                $("#profile-img").addClass("offline");
            } else {
                $("#profile-img").removeClass();
            };

            $("#status-options").removeClass("active");
        });

        function newMessage() {
            message = $(".message-input input").val();
            /*alert(message);*/
            console.log(message);
            if($.trim(message) == '') {
                return false;
            }
            /*$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));*/
            $('<li class="sent"><img src="{{Session::get('u_image')}}" alt="" /><p class="itemAdded">' + message + '</p></li>').appendTo($('.messages ul'));
            $('.message-input input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
        };

        $('.submit').click(function() {
            newMessage();
        });

        $(window).on('keydown', function(e) {
            if (e.which == 13) {
                newMessage();
                return false;
            }
        });
        //# sourceURL=pen.js
    </script>

    <script>
        $(".clickable").on('click', function(){
            $(".clickable").removeClass('active');
            $(this).addClass('active');
        });

    </script>
    {{--//////////////////////////////////////////////////////////////////////////////////--}}


    {{--////back end code started////--}}


    {{--////backEnd code ended////--}}

    <script>
        $(document).on('click', '.testable', function () {
            console.log($(this).attr("order"));
            order=$(this).attr("order");
                var workerChat = $(this).attr("worker");
                var user_id = "{{Session::get('u_id')}}";
                $("#myMessage").val(workerChat);
            $.ajax({
                type:"post",
                url: "{{route('getMessages22')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{worker_id:workerChat,user_id:user_id,"_token": "{{ csrf_token() }}",},
                success:function(res){
                    /*console.log(workerChat);*/
                    if(res){
                        $(".messages").empty();
                        $.each(res,function(key,value){
                            var type;
                            var image;
                            if (value == "worker"){
                                type = "replies";
                                /*image = "logo-12.png";*/
                                image = "{{asset('/jaz/images/logo-12.png')}}";
                            }else{
                                type = "sent";
                                /*image = "default.png";*/
                                image = "{{Session::get('u_image')}}";
                            }
                            $(".messages").append('<ul class="messages-body"><li class="'+type+'"><img src="'+image+'"><p class="itemAdded" >' + key +'</p></li></ul>');
                            $("."+workerChat).addClass("hidden");
                        });
                    }
                    if(res.length === 0){
                        //$(".messages").empty();
                    }
                }
            });
            });
    </script>

    <script>
        $(window).on('keydown', function(e) {
            if (e.which == 13) {
                var workerChat = $("#myMessage").val();
                var user_id = "{{Session::get('u_id')}}";

                var message = $('.itemAdded:last').html();
                /*console.log(message);*/
                $.ajax({
                    type:"post",
                    url: "{{route('addMessages22')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{message:message,worker_id:workerChat,user_id:user_id,order_id:order,"_token": "{{ csrf_token() }}",},
                    success:function(res){
                        if(res){
                            /*console.log('doneeeeeeeeeeee');*/
                        }
                    }
                });
                return false;
            }
        });
    </script>
    <script>
        function users(){
            console.log('doneeeeeeeeeeee101');
            var user_id = "{{Session::get('u_id')}}";
            $.ajax({
                type:"post",
                url: "{{route('getChatUpdates22')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{user_id:user_id,"_token": "{{ csrf_token() }}",},
                success:function(res){
                    if(res){
                        /*console.log(res[0].is_read);*/
                        for (i = 0; i < res.length; i++) {
                            if (res[i].is_read == 0){
                                $("."+res.worker_id).removeClass("hidden");
                                console.log("fffffff");
                            }
                        }

                    }
                }
            });
        }
        /*users();*/
        setInterval(function(){
            users()
        }, 30000);
    </script>
@endsection
