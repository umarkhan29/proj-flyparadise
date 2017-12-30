

<div class="pop-up-form">
	 <p class="remove-popup">X</p>
	 
    <div class="form-image">
        <img src="./assets/form/form.png" alt="">
    </div>
	
	<?php include_once('home/ajaxcomponents/getquery.php'); ?>
	
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
                    <input id="locationTextFieldD"  class="input-field" placeholder="Leaving from this place" type="text" size="50">
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
                    <input id="locationTextFieldA"  class="input-field" placeholder="Want to see" type="text" size="50">
                </div>
            </li>
            <li>
                <label for="">Enter Phone No.</label>
                <div class="inp">
                    <img src="./assets/icons/social/smartphone.svg" alt="">
                    <input class="input-field" id="phone" placeholder="Enter Phone" min="9" max="10" required type="tel">
                </div>
            </li>
            <li>
                <label for="">Enter your Email</label>
                <div class="inp">
                    <img src="./assets/icons/social/mail.svg" alt="">
                    <input class="input-field" id="email"  placeholder="Your email-ID" required type="email">
                </div>
            </li>
        </ul>
        <ul class="depart-date">
            <li><label for="datepicker">Departure date</label>
                <input id="datepicker" placeholder="Preferred date of travel" type="date" /></li>
            <li class="day--counter no-of-day">
                <span class="hsidebar">Duration (in nights)</span>
                <input id="counter-no" type="number" min="1" max="30" value="1" />
            </li>
    
            </form>
        </ul>
        <ul class="hotel radio no-border">
            <li>
                <input type="radio" id="f-option" name="selector">
                <label for="f-option">Honeymoon</label>
    
                <div class="check"></div>
            </li>
    
            <li>
                <input type="radio" id="s-option" name="selector">
                <label for="s-option">Solo</label>
    
                <div class="check">
                    <div class="inside"></div>
                </div>
            </li>
    
            <li>
                <input type="radio" id="t-option" name="selector">
                <label for="t-option">Family</label>
    
                <div class="check">
                    <div class="inside"></div>
                </div>
            </li>
            <li>
                <input type="radio" id="w-option" name="selector">
                <label for="w-option">Weekend</label>
    
                <div class="check">
                    <div class="inside"></div>
                </div>
            </li>
            <li>
                <input type="radio" id="x-option" name="selector">
                <label for="x-option">Friends</label>
    
                <div class="check">
                    <div class="inside"></div>
                </div>
            </li>
        </ul>
        <button class="cta" type="submit" value="Curate my package" onClick="getquery('queryresponse');">Curate my Package</button>
    </div>
</div>

