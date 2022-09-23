@extends('layouts.client.master')
@section('title', 'Liên hệ')
@section('content')
    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8639810443715!2d105.74459841462281!3d21.038127785993264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEZQVCBQb2x5dGVjaG5pYw!5e0!3m2!1svi!2s!4v1658486838643!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">

                        <ul>
                            <li>
                                <h4>Địa chỉ</h4>
                                <p>Tòa nhà FPT Polytechnic, P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liêm, Hà Nội, Việt Nam</p>
                            </li>
                            <li>
                                <h4>Thông tin liên hệ</h4>
                                <p>Email: hieunvph14434@fpt.edu.vn <br />SĐT: +84 389957717</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">

                    <div class="contact__form">
                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <input type="text" class="border-secondary" style="border-radius: 5px ;margin-bottom: 10px; color: #333"  name="name" placeholder="Họ và tên">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <input type="text" class="border-secondary" style="border-radius: 5px;margin-bottom: 10px; color: #333" name="email" placeholder="Email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                                <div class="col-lg-12">
                                    <textarea name="message" class="border-secondary" style="border-radius: 5px;margin-bottom: 10px; color: #333" placeholder="Nội dung"></textarea>
                                    @error('message')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <button type="submit" class="site-btn">Gửi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        @if (session('message'))
        Swal.fire({
           position: 'top-end',
           icon: 'success',
           title: '{{session('message')}}',
           showConfirmButton: false,
           timer: 1500
           })
       @endif
   </script>
    <!-- Contact Section End -->
@endsection
