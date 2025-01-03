@extends('layouts.app')
@section('content')
  

<body>
    <section>
        <div class="container py-5">

            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold">Live chat</p>
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-body">

                           <div id="message_container" style="min-height: 300px;">
                            
                           </div>



                            <div data-mdb-input-init class="form-outline">
                                <form id="message_form">
                                    <textarea class="form-control bg-body-tertiary" id="message" rows="2"></textarea>
                                    <div class="d-flex justify-content-between mt-1">
                                        <label class="form-label" for="textAreaExample">Type your message</label>
                                        <button type="button" id="submit_btn" class="btn btn-primary btn-sm"
                                            id="">Send</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        let submitBtn = $('#submit_btn');
        messageField = $('#message');
        let message;
        let senderId = `{{ auth()->user()->id }}`;


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': `{{ csrf_token() }}`
            }
        });
        setTimeout(() => {

            window.Echo.channel('chatMessage')
                .listen('Chat', (e) => {
                    var newMessage;
                    if(senderId==e.senderId){
                        newMessage=`
                        <div class="d-flex flex-row justify-content-end mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="p-3 ms-3"
                                    style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                    <strong>${e.userName}</strong>
                                    <p class="small mb-0">${e.message}</p>
                                </div>
                            </div>
                        `;
                    }else{
                        newMessage=`
                        <div class="d-flex flex-row justify-content-start mb-4">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                    alt="avatar 1" style="width: 45px; height: 100%;">
                                <div class="p-3 ms-3"
                                    style="border-radius: 15px; background-color: rgba(10, 192, 237,.2);">
                                    <strong>${e.userName}</strong>
                                    <p class="small mb-0">${e.message}</p>
                                </div>
                            </div>
                        `;
                    }
                    $('#message_container').append(newMessage)
                    
                });
        }, 1000);

        function validate() {
             message = messageField.val().trim(); // Trim whitespace
            submitBtn.prop('disabled', message === '');
        }

        // Attach event listener to the input field
        messageField.on('keyup', validate);

        // Initial validation on page load

        validate();


        submitBtn.click(function(e) {
            // e.preventDefault();
            message = $('#message').val();
            $.ajax({
                url: `{{ route('send_message') }}`,
                type: 'post',
                data: {
                    message: message,
                    senderId: senderId
                },
                success: function(data) {
                    messageField.val('')
                    
                }
            })
        })
    </script>

@endsection
