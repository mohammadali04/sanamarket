<section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div style="height: 480px;" id="map"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
        </script>

      </div>


      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">با ما در تماس باشید</h2>
        </div>
        <div class="col-lg-8">
          <form novalidate="novalidate" id="contactForm" method="post" action="contact_process.php" class="form-contact contact_form">
            <div dir="rtl" class="row">
              <div class="col-12">
                <div dir="rtl" class="form-group">

                  <textarea placeholder="پیام خود را وارد کنید" onblur="this.placeholder = 'Enter Message'" onfocus="this.placeholder = ''" rows="9" cols="30" id="message" name="message" class="form-control w-100"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" placeholder="نام " onblur="this.placeholder = 'Enter your name'" onfocus="this.placeholder = ''" id="name" name="name" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" placeholder="ایمیل" onblur="this.placeholder = 'Enter email address'" onfocus="this.placeholder = ''" id="email" name="email" class="form-control">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" placeholder="موضوع" onblur="this.placeholder = 'Enter Subject'" onfocus="this.placeholder = ''" id="subject" name="subject" class="form-control">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <a class="btn_3 button-contactForm" href="#">ارسال پیام</a>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>ایران، شیراز.</h3>
              <p>بلوار جمهوری</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>02112345678</h3>
              <p>شنبه تا پنجشنبه یکسره</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>email@website.com</h3>
              <p>سوالات خود را از ما بپرسید!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>