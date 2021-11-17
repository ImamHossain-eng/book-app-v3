<div class="about_section_2 layout_padding">
    <div class="container">
        <h1 class="contact_text_2"><strong>CONTACT US</strong></h1>
    </div>
  </div>
  <div class="contact_section">
  <div class="row">
    <div class="col-md-6 background_bg" style="background-color:#03174C;">
      <div class="contact_bg">
        <div class="input_main">
                   <div class="container">
                     <h2 class="request_text">REQUEST A CALL BACK</h2>
                     {{ Form::open(['route'=>'feedback', 'method'=>'POST', 'enctype'=>'multipart/form-data'])}}
                        <div class="form-group">
                          <input type="text" class="email-bt" placeholder="Your Name" name="name">
                        </div>
                        <div class="form-group">
                          <input type="email" class="email-bt" placeholder="Email" name="email">
                        </div>
                        <div class="form-group">
                          <input type="number" class="email-bt" placeholder="Phone" name="phone">
                        </div>
                        <div class="form-group">
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="message"></textarea>
                        </div>
                        <input type="submit" value="SEND" class="send_bt">
                        {{Form::close()}}
                   </div> 
                </div>
                
      </div>
    </div>
    <div class="col-md-6">
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.1752737877096!2d90.6173804495755!3d23.59804618458941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37544d2890d5c195%3A0x9c93fd428ace86e9!2sHamdard%20University%20Bangladesh!5e0!3m2!1sen!2sbd!4v1618854687522!5m2!1sen!2sbd" width="600" height="560" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
            </div>
      </div>
  </div>
  </div>