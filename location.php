

 <div class="pop-up remove">
 <form action="thanks" method="post">
	<div class="pop-up-form">
	<p class="remove-popup">X</p>
    <div class="form-image">
        <img src="./assets/form/form.png" alt="">
    </div>
    <div class="form-fields">
        <ul class="form">
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldD');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Departure point</label>

                <div class="inp">
                    <img src="./assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldD" class="input-field" placeholder="Leaving from this place" type="text" size="50" name="from_place">
                </div>
            </li>
            <li>
                <script>
                    function init() {
                        var input = document.getElementById('locationTextFieldA');
                        var autocomplete = new google.maps.places.Autocomplete(input);
                    }
                    google.maps.event.addDomListener(window, 'load', init);
                </script>
                <label for="locationTextField">Arrival point</label>

                <div class="inp">
                    <img src="./assets/icons/social/location.svg" alt="">
                    <input id="locationTextFieldA" class="input-field" placeholder="Want to see" type="text" size="50" name="to_loc" value="<?php if(!empty($_SESSION['formdest'])) echo $_SESSION['formdest']; ?>">
                </div>
            </li>
            <li>
                <label for="">Enter Phone No.</label>
                <div class="inp">
                    <img src="./assets/icons/social/smartphone.svg" alt="">
                    <input class="input-field" placeholder="Enter Phone" min="9" max="10" required type="tel" name="phone">
                </div>
            </li>
            <li>
                <label for="">Enter your Email</label>
                <div class="inp">
                    <img src="./assets/icons/social/mail.svg" alt="">
                    <input class="input-field" placeholder="Your email-ID" required type="email" name="email">
                </div>
            </li>
        </ul>
        <ul class="depart-date">
            <li><label for="datepicker">Departure date</label>
                <input id="datepicker" placeholder="Preferred date of travel" type="date" name="date"/></li>
            <ul class="number-counter--popup">
                <li class="day--counter no-of-day">
                    <span class="hsidebar">Duration (in nights)</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1"  name="nights"/>
                </li>
                <li class="day--counter no-of-people">
                    <span class="hsidebar">Number of Travellers</span>
                    <input id="counter-no" type="number" min="1" max="30" value="1" name="travellers" />
                </li>
            </ul>

            </form>
        </ul>
        <form class="list hotel radio no-border">
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" checked value="Honeymoon"  name="foo">
                             Honeymoon
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Friends and Family" name="foo">
                             Friends & Family
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Adventure" name="foo">
                              Adventure
                          </label>
            </li>
            <li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Solo" name="foo">
                             Solo
                          </label>
            </li>
			<li class="list__item">
                <label class="label--radio">
                              <input type="radio" class="radio" value="Weekend" name="foo">
                             Weekend
                          </label>
            </li>
        </form>
        <button class="cta" type="submit" value="Curate my package">Curate my Package</button>
    </div>
</div>
<!--End of form -->
</form>

</div>
