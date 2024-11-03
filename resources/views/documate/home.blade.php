<x-main-layouts>
    <x-slot name="title">
        HOME
    </x-slot>
    <section class=" mx-auto" style=" width:100%;">
        <h5 class="my-3 mx-5">DocuMate | HOME</h3>
        <div class="hero" id="home" style="position: relative; background-image: url('{{'/storage/images/hero.jpg'}}'); background-size: cover; background-position: top; color: white; padding: 100px 20px;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5);"></div>
            <div style="position: relative; z-index: 1;">
                <h1>Streamlined Business Permit Processing</h1>
                <p>Get your business permit quickly and easily, all online!</p>
                <a href="{{route('documate.newapp')}}" class="btn btn-primary btn-lg py-4 px-3">Start Your Application</a>
            </div>
        </div>
        <div class="container mt-5" id="services">
            <h1 class="text-center"><b>About Our Services</b></h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-passport"></i></h3>
                            <h5 class="card-title">Online Application</h5>
                            <p class="card-text">Submit your business permit application online <br> in minutes.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-file-circle-check"></i></h1>
                            <h5 class="card-title">Document Verification</h5>
                            <p class="card-text">We verify all documents to ensure a smooth approval process.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-body-secondary">
                        <div class="card-body text-center">
                            <h1><i class="fa-solid fa-headset"></i></h1>
                            <h5 class="card-title">Customer Support</h5>
                            <p class="card-text">Our team is available to assist you at every step of the way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main-layouts>