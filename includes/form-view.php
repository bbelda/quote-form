<?php

// Front End viewing form

// function html_form_code() {
// 	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
// 	echo '<p>';
// 	echo 'Your Name (required) <br/>';
// 	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . ';
// 	echo '</p>';
// 	echo '<p>';
// 	echo 'Your Email (required) <br/>';
// 	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
// 	echo '</p>';
// 	echo '<p>';
// 	echo 'Subject (required) <br/>';
// 	echo '<input type="text" name="cf-subject" pattern="[a-zA-Z ]+" value="' . ( isset( $_POST["cf-subject"] ) ? esc_attr( $_POST["cf-subject"] ) : '' ) . '" size="40" />';
// 	echo '</p>';
// 	echo '<p>';
// 	echo 'Your Message (required) <br/>';
// 	echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
// 	echo '</p>';
// 	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
// 	echo '</form>';
// }

function html_form_code() {
    ?>
    <div class="quote-wrapper">
        <div class="quote-container">
            <div class="steps" id="steps">
                <ul>
                    <li class="active">
                        <span class="basic"></span>
                        <p>1.<br> Basic<br> Details</p>
                    </li>
                    <li>
                        <span class="routing"></span>
                        <p>2.<br> Routing <br>Details</p>
                    </li>
                    <li>
                        <span class="cargo"></span>
                        <p>3.<br> Cargo<br> Details</p>
                    </li>
                </ul>
            </div>
            <form class="quote-form" id="quote-form" action="/wp-admin/admin-ajax.php" method="POST" novalidate autocomplete="off">
                <div class="quote-steps active" id="first">
                    <input type="hidden" name="action" value="quoting-form">
                    <div class="quote-form-group-container">
                        <div class="form-step-holder">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Company</label>
                                        <input type="text" name="company-name" placeholder="Company" class="letters-numbers-format" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Full Name*</label>
                                        <input type="text" name="full-name" placeholder="Full Name*" class="letters-format" required="" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Phone Number*</label>
                                        <input type="tel" name="phone-number" placeholder="Phone Number*" class="phone-format" required=""  autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Email Address*</label>
                                        <input type="email" name="email-address" placeholder="Email Address*" required="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Country:</label>
                                        <input type="text" name="address-country" class="letters-format" placeholder="Country" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>City:</label>
                                        <input type="text" name="address-city" class="letters-format" placeholder="City" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>State:</label>
                                        <input type="text" name="address-state" class="letters-format" placeholder="State" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group">
                                        <label>Zip Code:</label>
                                        <input type="text" name="address-zip-code" placeholder="Zip Code" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="quote-form-group has-select-picker selection-services">
                                        <label>Select Service Required</label>
                                        <div class="fake-select">
                                            <input type="hidden" name="requested-service" class="fake-input floating-label" required="" readonly="readonly" data-service="">
                                            <div class="fake-input-text required">
                                                <p>Select Service Type</p>
                                            </div>
                                            <div class="fake-select-picker" style="display: none;">
                                                <div class="fake-input">
                                                    <label>Select Service Type</label>
                                                    <p></p>
                                                </div>
                                                <ul>
                                                    <li data-services="air-freight">Air Freight</li>
                                                    <li data-services="ocean-freight-fcl">Ocean-FCL</li>
                                                    <li data-services="ocean-freight-lcl">Ocean-LCL</li>
                                                    <li data-services="breakbulk">Breakbulk</li>
                                                    <li data-services="warehousing">Warehousing</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="quote-form-group">
                                        <label>Specify your Requirements:</label>
                                        <textarea name="specific-requirement"placeholder="Enter Specific Requirements" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="quote-form-group button-steps pull-right">
                                        <button type="button" class="next-step step-1" data-hover="Next"><span>Next</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quote-steps"  id="second" style="display: none;">
                    <div class="quote-form-group-container">
                        <div class="form-step-holder">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="quote-form-group has-select-picker" id="services-type">
                                        <label>Service Type</label>
                                        <div class="fake-select">
                                            <input type="hidden" name="services-type" class="fake-input floating-label" required="" readonly="readonly" data-service-type="">
                                            <div class="fake-input-text required">
                                                <p>Service Type</p>
                                            </div>
                                            <div class="fake-select-picker" style="display: none;">
                                                <div class="fake-input">
                                                    <label>Service Type</label>
                                                    <p></p>
                                                </div>
                                                <ul>
                                                    <li data-services-type="door-to-port">Door To Port</li>
                                                    <li data-services-type="port-to-door">Port To Door</li>
                                                    <li data-services-type="port-to-port">Port To Port</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="quote-form-group has-select-picker" id="pickup-required">
                                        <label>Pickup Required?</label>
                                        <div class="fake-select">
                                            <input type="hidden" name="pickup-required" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                            <div class="fake-input-text required">
                                                <p>Pickup Required?</p>
                                            </div>
                                            <div class="fake-select-picker" style="display: none;">
                                                <div class="fake-input">
                                                    <label>Pickup Required?</label>
                                                    <p></p>
                                                </div>
                                                <ul>
                                                    <li data-choices="Yes">Yes</li>
                                                    <li data-choices="No">No</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="origin">
                                <div class="col-md-12">
                                    <div class="quote-subheading">
                                        <h3>ORIGIN</h3>
                                    </div>
                                    <div class="quote-form-group-sub-container">
                                        <div class="row">
                                            <div class="col-md-3" id="origin-country-change">
                                                <div class="quote-form-group">
                                                    <label>Country*</label>
                                                    <input type="text" name="origin-country" class="letters-format" placeholder="Country*" required="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="origin-city-change">
                                                <div class="quote-form-group">
                                                    <label>City*</label>
                                                    <input type="text" name="origin-city" class="letters-format" placeholder="City*" autocomplete="off" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="origin-zip-code-change">
                                                <div class="quote-form-group">
                                                    <label>Zip Code*</label>
                                                    <input type="text" name="origin-zip-code" class="zip-code-format" placeholder="Zip Code*" autocomplete="off" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="origin-loading-change">
                                                <div class="quote-form-group">
                                                    <label>Port of Loading</label>
                                                    <input type="text" name="origin-loading" placeholder="Port of Loading" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="destination">
                                <div class="col-md-12">
                                    <div class="quote-subheading">
                                        <h3>DESTINATION</h3>
                                    </div>
                                    <div class="quote-form-group-sub-container">
                                        <div class="row">
                                            <div class="col-md-3" id="destination-country-change">
                                                <div class="quote-form-group">
                                                    <label>Country*</label>
                                                    <input type="text" name="destination-country" class="letters-format" placeholder="Country*" autocomplete="off" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="destination-city-change">
                                                <div class="quote-form-group">
                                                    <label>City*</label>
                                                    <input type="text" name="destination-city" class="letters-format" placeholder="City*" autocomplete="off" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-3" id="destination-loading-change">
                                                <div class="quote-form-group">
                                                    <label>Port of Destination</label>
                                                    <input type="text" name="destination-loading" placeholder="Port of Destination" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="quote-form-group button-steps pull-right">
                                        <button type="button" class="next-step step-2" data-hover="Next"><span>Next</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="quote-steps"  id="third" style="display: none;">
                    <div class="quote-form-group-container">
                        <div class="form-step-holder">
                            <div id="ocean-freight-fcl" class="selected-service active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-text-heading">
                                            <h3>Ocean - Full Container Load (FCL)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="cargo-item-details active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="repeating">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="repeating-header">
                                                            <p class="padded blue-text">
                                                                CONTAINER #<span class="number"></span>
                                                            </p>
                                                            <button type="button" class="remove">- Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Container Quantity:</label>
                                                            <input type="text" name="ocean-fcl-quantity[]" placeholder="Container Quantity" class="numbers-format min-number quantity-number" autocomplete="off" required="" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 container-size">
                                                        <div class="quote-form-group has-select-picker">
                                                            <label>Container size</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="ocean-fcl-size[]" class="fake-input floating-label" required="" readonly="readonly">
                                                                <div class="fake-input-text required">
                                                                    <p>Container size</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Container size</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li>20'</li>
                                                                        <li>40'</li>
                                                                        <li>45'</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 container-type">
                                                        <div class="quote-form-group has-select-picker">
                                                            <label>Container Type:</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="ocean-fcl-type[]" class="fake-input floating-label" required="" readonly="readonly">
                                                                <div class="fake-input-text required">
                                                                    <p>Container Type</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Container Type</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li>Dry Freight</li>
                                                                        <li>Flat Rack</li>
                                                                        <li>Open Top</li>
                                                                        <li>Refrigerated</li>
                                                                        <li>Standard</li>
                                                                        <li>Tank</li>
                                                                        <li>High Tube</li>
                                                                        <li>Hard Top</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group has-select-picker hazmat-select">
                                                            <label>Is cargo hazmat?</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="ocean-fcl-hazmat-select[]" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                                <div class="fake-input-text required">
                                                                    <p>Is cargo hazmat?</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Is cargo hazmat?</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li data-choices="Yes">Yes</li>
                                                                        <li data-choices="No">No</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-class-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Hazmat Class:</label>
                                                            <input type="text" name="ocean-fcl-hazmat-class[]" placeholder="Hazmat Class (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-un-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>UN#</label>
                                                            <input type="text" name="ocean-fcl-hazmat-un[]" placeholder="UN# (Optional)" class="numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-park-group-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Park Group#</label>
                                                            <input type="text" name="ocean-fcl-hazmat-park-group[]" placeholder="Park Group# (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="quote-form-group">
                                                            <label>Cargo Description:</label>
                                                            <textarea name="ocean-fcl-cargo-description[]" placeholder="Enter Cargo Description*"  autocomplete="off" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="quote-form-group button-steps pull-right">
                                                <button type="button" class="add-container" id="add-container" data-hover="+ Add Another Container"><span>+ Add Another Container</span></button>
                                                <button type="button" class="next-step submit-step" data-hover="Submit"><span>Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="ocean-freight-lcl" class="selected-service" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-text-heading">
                                            <h3>Ocean - Less than Container Load (LCL)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="quote-form-group has-select-picker cargo-details">
                                            <label>Cargo Details</label>
                                            <div class="fake-select">
                                                <input type="hidden" name="ocean-lcl-cargo-details" class="fake-input floating-label" required="" readonly="readonly" data-cargo-detail="">
                                                <div class="fake-input-text required">
                                                    <p>Cargo Details</p>
                                                </div>
                                                <div class="fake-select-picker" style="display: none;">
                                                    <div class="fake-input">
                                                        <label>Cargo Details</label>
                                                        <p></p>
                                                    </div>
                                                    <ul>
                                                        <li data-cargo-details="total">By Totals</li>
                                                        <li data-cargo-details="package">By Packages</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cargo-item-details disabled by-totals">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Quantity</label>
                                                <input type="text" name="ocean-lcl-bytotal-quantity" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number number-input-value" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Type</label>
                                                <input type="text" name="ocean-lcl-bytotal-type" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group has-select-picker stackable-select">
                                                <label>Is cargo stackable?</label>
                                                <div class="fake-select">
                                                    <input type="hidden" name="ocean-lcl-bytotal-stackable" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                    <div class="fake-input-text required">
                                                        <p>Is cargo stackable?</p>
                                                    </div>
                                                    <div class="fake-select-picker" style="display: none;">
                                                        <div class="fake-input">
                                                            <label>Is cargo stackable?</label>
                                                            <p></p>
                                                        </div>
                                                        <ul>
                                                            <li data-choices="Yes">Yes</li>
                                                            <li data-choices="No">No</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Volume</label>
                                                <input type="text" name="ocean-lcl-bytotal-total-volume" placeholder="Total Volume" autocomplete="off" class="numbers-format min-number total-volume-data number-input-value" min="1">
                                                <p class="floated-unit">(FT<sup>3</sup>)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Weight</label>
                                                <input type="text" name="ocean-lcl-bytotal-total-weight" placeholder="Total Weight" autocomplete="off" class="numbers-format min-number total-weight-data number-input-value" min="1">
                                                <p class="floated-unit">(KGS)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group has-select-picker hazmat-select">
                                                <label>Is cargo hazmat?</label>
                                                <div class="fake-select">
                                                    <input type="hidden" name="ocean-lcl-bytotal-hazmat-select" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                    <div class="fake-input-text required">
                                                        <p>Is cargo hazmat?</p>
                                                    </div>
                                                    <div class="fake-select-picker" style="display: none;">
                                                        <div class="fake-input">
                                                            <label>Is cargo hazmat?</label>
                                                            <p></p>
                                                        </div>
                                                        <ul>
                                                            <li data-choices="Yes">Yes</li>
                                                            <li data-choices="No">No</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-class-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>Hazmat Class:</label>
                                                <input type="text" name="ocean-lcl-bytotal-hazmat-class" placeholder="Hazmat Class (Optional)" class="letters-numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-un-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>UN#</label>
                                                <input type="text" name="ocean-lcl-bytotal-hazmat-un" placeholder="UN# (Optional)" class="numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-park-group-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>Park Group#</label>
                                                <input type="text" name="ocean-lcl-bytotal-hazmat-park-group" placeholder="Park Group# (Optional)" class="letters-numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="quote-form-group">
                                                <label>Cargo Description:</label>
                                                <textarea name="ocean-lcl-bytotal-cargo-description" placeholder="Enter Cargo Description*" autocomplete="off" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="ocean-lcl-by-total" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="ocean-lcl-bytotal-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="ocean-lcl-bytotal-total-volume" class="total-volume-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="ocean-lcl-bytotal-total-weight" class="total-weight-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="ocean-lcl-bytotal-total-volume-weight" class="total-volume-weight-value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="cargo-item-details by-packages" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="repeating">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="repeating-header">
                                                            <p class="padded blue-text">
                                                                PACKAGE #<span class="number"></span>
                                                            </p>
                                                            <button type="button" class="remove">- Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Quantity</label>
                                                            <input type="text" name="ocean-lcl-bypackages-quantity[]" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number number-input-value" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Type</label>
                                                            <input type="text" name="ocean-lcl-bypackages-type[]" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group has-select-picker stackable-select">
                                                            <label>Is cargo stackable?</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="ocean-lcl-bypackages-stackable[]" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                                <div class="fake-input-text required">
                                                                    <p>Is cargo stackable?</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Is cargo stackable?</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li data-choices="Yes">Yes</li>
                                                                        <li data-choices="No">No</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Length:</label>
                                                            <input type="text" name="ocean-lcl-bypackages-length[]" placeholder="Length" class="numbers-format length-data dimension-number number-input-value" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="ocean-lcl-bypackages-length-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Width:</label>
                                                            <input type="text" name="ocean-lcl-bypackages-width[]" placeholder="Width" class="numbers-format width-data dimension-number number-input-value" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="ocean-lcl-bypackages-width-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Height:</label>
                                                            <input type="text" name="ocean-lcl-bypackages-height[]" placeholder="Height" class="numbers-format height-data dimension-number number-input-value" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="ocean-lcl-bypackages-height-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Weight:</label>
                                                            <input type="text" name="ocean-lcl-bypackages-weight[]" placeholder="Weight" class="numbers-format weight-data dimension-number number-input-value" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker weight-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="ocean-lcl-bypackages-weight-unit[]" class="fake-input floating-label" value="(KGS)" data-weight="KGS">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(KGS)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(KGS)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-weights="KGS" class="active">(KGS)</li>
                                                                            <li data-weights="LBS">(LBS)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group has-select-picker hazmat-select">
                                                            <label>Is cargo hazmat?</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="ocean-lcl-bypackages-hazmat-select[]" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                                <div class="fake-input-text required">
                                                                    <p>Is cargo hazmat?</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Is cargo hazmat?</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li data-choices="Yes">Yes</li>
                                                                        <li data-choices="No">No</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-class-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Hazmat Class:</label>
                                                            <input type="text" name="ocean-lcl-bypackages-hazmat-class[]" placeholder="Hazmat Class (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-un-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>UN#</label>
                                                            <input type="text" name="ocean-lcl-bypackages-hazmat-un[]" placeholder="UN# (Optional)" class="numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-park-group-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Park Group#</label>
                                                            <input type="text" name="ocean-lcl-bypackages-hazmat-park-group[]" placeholder="Park Group# (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="quote-form-group">
                                                            <label>Package Description:</label>
                                                            <textarea name="ocean-lcl-bypackages-package-description[]" placeholder="Enter Package Description*"  autocomplete="off" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="ocean-lcl-by-packages" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit total-volume-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-volume" class="total-volume-value">
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-volume-unit" class="total-volume-value-unit" value="FT">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit total-weight-unit">KGS</span>
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-weight" class="total-weight-value">
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-weight-unit" class="total-weight-value-unit" value="KGS">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit total-volume-weight-unit">KGS</span>
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-volume-weight" class="total-volume-weight-value">
                                                    <input type="hidden" name="ocean-lcl-bypackages-total-volume-weight-unit" class="total-volume-weight-value-unit" value="KGS">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-form-group button-steps pull-right">
                                            <button type="button" class="add-container" id="add-container" style="opacity: 0;" data-hover="+ Add Another Package"><span>+ Add Another Package</span></button>
                                            <button type="button" class="next-step submit-step" data-hover="Submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="air-freight" class="selected-service" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-text-heading">
                                            <h3>Air Freight</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="quote-form-group has-select-picker cargo-details">
                                            <label>Cargo Details</label>
                                            <div class="fake-select">
                                                <input type="hidden" name="air-cargo-details" class="fake-input floating-label" required="" readonly="readonly" data-cargo-detail="">
                                                <div class="fake-input-text required">
                                                    <p>Cargo Details</p>
                                                </div>
                                                <div class="fake-select-picker" style="display: none;">
                                                    <div class="fake-input">
                                                        <label>Cargo Details</label>
                                                        <p></p>
                                                    </div>
                                                    <ul>
                                                        <li data-cargo-details="total">By Totals</li>
                                                        <li data-cargo-details="package">By Packages</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cargo-item-details disabled by-totals">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Quantity</label>
                                                <input type="text" name="air-bytotal-quantity" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number min-number number-input-value" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Type</label>
                                                <input type="text" name="air-bytotal-type" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group has-select-picker stackable-select">
                                                <label>Is cargo stackable?</label>
                                                <div class="fake-select">
                                                    <input type="hidden" name="air-bytotal-stackable" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                    <div class="fake-input-text required">
                                                        <p>Is cargo stackable?</p>
                                                    </div>
                                                    <div class="fake-select-picker" style="display: none;">
                                                        <div class="fake-input">
                                                            <label>Is cargo stackable?</label>
                                                            <p></p>
                                                        </div>
                                                        <ul>
                                                            <li data-choices="Yes">Yes</li>
                                                            <li data-choices="No">No</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Volume</label>
                                                <input type="text" name="air-bytotal-total-volume" placeholder="Total Volume" autocomplete="off" class="numbers-format min-number total-volume-data number-input-value min-number" min="1">
                                                <p class="floated-unit">(FT<sup>3</sup>)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Weight</label>
                                                <input type="text" name="air-bytotal-total-weight" placeholder="Total Weight" autocomplete="off" class="numbers-format min-number total-weight-data number-input-value min-number" min="1">
                                                <p class="floated-unit">(KGS)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group has-select-picker hazmat-select">
                                                <label>Is cargo hazmat?</label>
                                                <div class="fake-select">
                                                    <input type="hidden" name="air-bytotal-hazmat-select" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                    <div class="fake-input-text required">
                                                        <p>Is cargo hazmat?</p>
                                                    </div>
                                                    <div class="fake-select-picker" style="display: none;">
                                                        <div class="fake-input">
                                                            <label>Is cargo hazmat?</label>
                                                            <p></p>
                                                        </div>
                                                        <ul>
                                                            <li data-choices="Yes">Yes</li>
                                                            <li data-choices="No">No</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-class-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>Hazmat Class:</label>
                                                <input type="text" name="air-bytotal-hazmat-class" placeholder="Hazmat Class (Optional)" class="letters-numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-un-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>UN#</label>
                                                <input type="text" name="air-bytotal-hazmat-un" placeholder="UN# (Optional)" class="numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3 hazmat-park-group-change" style="display: none;">
                                            <div class="quote-form-group">
                                                <label>Park Group#</label>
                                                <input type="text" name="air-bytotal-hazmat-park-group" placeholder="Park Group# (Optional)" class="letters-numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="quote-form-group">
                                                <label>Cargo Description:</label>
                                                <textarea name="air-bytotal-cargo-description" placeholder="Enter Cargo Description*" autocomplete="off" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="air-by-total" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="air-bytotal-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="air-bytotal-total-volume" class="total-volume-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="air-bytotal-total-weight" class="total-weight-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="air-bytotal-total-volume-weight" class="total-volume-weight-value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="cargo-item-details by-packages" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="repeating">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="repeating-header">
                                                            <p class="padded blue-text">
                                                                PACKAGE #<span class="number"></span>
                                                            </p>
                                                            <button type="button" class="remove">- Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Quantity</label>
                                                            <input type="text" name="air-bypackages-quantity[]" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number number-input-value" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Type</label>
                                                            <input type="text" name="air-bypackages-type[]" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group has-select-picker stackable-select">
                                                            <label>Is cargo stackable?</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="air-bypackages-stackable[]" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                                <div class="fake-input-text required">
                                                                    <p>Is cargo stackable?</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Is cargo stackable?</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li data-choices="Yes">Yes</li>
                                                                        <li data-choices="No">No</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Length:</label>
                                                            <input type="text" name="air-bypackages-length[]" placeholder="Length" class="numbers-format length-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="air-bypackages-length-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Width:</label>
                                                            <input type="text" name="air-bypackages-width[]" placeholder="Width" class="numbers-format width-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="air-bypackages-width-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Height:</label>
                                                            <input type="text" name="air-bypackages-height[]" placeholder="Height" class="numbers-format height-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="air-bypackages-height-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Weight:</label>
                                                            <input type="text" name="air-bypackages-weight[]" placeholder="Weight" class="numbers-format weight-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker weight-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="air-bypackages-weight-unit[]" class="fake-input floating-label" value="(KGS)" data-weight="KGS">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(KGS)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(KGS)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-weights="KGS" class="active">(KGS)</li>
                                                                            <li data-weights="LBS">(LBS)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group has-select-picker hazmat-select">
                                                            <label>Is cargo hazmat?</label>
                                                            <div class="fake-select">
                                                                <input type="hidden" name="air-bypackages-hazmat-select[]" class="fake-input floating-label" required="" readonly="readonly" data-choice="">
                                                                <div class="fake-input-text required">
                                                                    <p>Is cargo hazmat?</p>
                                                                </div>
                                                                <div class="fake-select-picker" style="display: none;">
                                                                    <div class="fake-input">
                                                                        <label>Is cargo hazmat?</label>
                                                                        <p></p>
                                                                    </div>
                                                                    <ul>
                                                                        <li data-choices="Yes">Yes</li>
                                                                        <li data-choices="No">No</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-class-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Hazmat Class:</label>
                                                            <input type="text" name="air-bypackages-hazmat-class[]" placeholder="Hazmat Class (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-un-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>UN#</label>
                                                            <input type="text" name="air-bypackages-hazmat-un[]" placeholder="UN# (Optional)" class="numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 hazmat-park-group-change" style="display: none;">
                                                        <div class="quote-form-group">
                                                            <label>Park Group#</label>
                                                            <input type="text" name="air-bypackages-hazmat-park-group[]" placeholder="Park Group# (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="quote-form-group">
                                                            <label>Package Description:</label>
                                                            <textarea name="air-bypackages-package-description[]" placeholder="Enter Package Description*"  autocomplete="off" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="air-by-packages" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="air-bypackages-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit total-volume-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="air-bypackages-total-volume" class="total-volume-value">
                                                    <input type="hidden" name="air-bypackages-total-volume-unit" class="total-volume-value-unit" value="FT">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit total-weight-unit">KGS</span>
                                                    <input type="hidden" name="air-bypackages-total-weight" class="total-weight-value">
                                                    <input type="hidden" name="air-bypackages-total-weight-unit" class="total-weight-value-unit" value="KGS">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit total-volume-weight-unit">KGS</span>
                                                    <input type="hidden" name="air-bypackages-total-volume-weight" class="total-volume-weight-value">
                                                    <input type="hidden" name="air-bypackages-total-volume-weight-unit" class="total-volume-weight-value-unit" value="KGS">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-form-group button-steps pull-right">
                                            <button type="button" class="add-container" id="add-container"  style="opacity: 0;" data-hover="+ Add Another Package"><span>+ Add Another Package</span></button>
                                            <button type="button" class="next-step submit-step" data-hover="Submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="breakbulk" class="selected-service" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-text-heading">
                                            <h3>Breakbulk</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="quote-form-group has-select-picker cargo-details">
                                            <label>Cargo Details</label>
                                            <div class="fake-select">
                                                <input type="hidden" name="breakbulk-cargo-details" class="fake-input floating-label" required="" readonly="readonly" data-cargo-detail="">
                                                <div class="fake-input-text required">
                                                    <p>Cargo Details</p>
                                                </div>
                                                <div class="fake-select-picker" style="display: none;">
                                                    <div class="fake-input">
                                                        <label>Cargo Details</label>
                                                        <p></p>
                                                    </div>
                                                    <ul>
                                                        <li data-cargo-details="total">By Totals</li>
                                                        <li data-cargo-details="package">By Packages</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cargo-item-details disabled by-totals">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Quantity</label>
                                                <input type="text" name="breakbulk-bytotal-quantity" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number min-number number-input-value" min="1">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Package Type</label>
                                                <input type="text" name="breakbulk-bytotal-type" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Volume</label>
                                                <input type="text" name="breakbulk-bytotal-total-volume" placeholder="Total Volume" autocomplete="off" class="numbers-format min-number total-volume-data number-input-value min-number" min="1">
                                                <p class="floated-unit">(FT<sup>3</sup>)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group total-units">
                                                <label>Total Weight</label>
                                                <input type="text" name="breakbulk-bytotal-total-weight" placeholder="Total Weight" autocomplete="off" class="numbers-format min-number total-weight-data number-input-value min-number" min="1">
                                                <p class="floated-unit">(KGS)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Make</label>
                                                <input type="text" name="breakbulk-bytotal-make" placeholder="Make (Optional)" class="letters-numbers-format" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="quote-form-group">
                                                <label>Model Number</label>
                                                <input type="text" name="breakbulk-bytotal-model" placeholder="Modal Number (Optional)" class="models-format" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="quote-form-group">
                                                <label>Cargo Description:</label>
                                                <textarea name="breakbulk-bytotal-cargo-description" placeholder="Enter Cargo Description*" autocomplete="off" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="breakbulk-by-total" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="breakbulk-bytotal-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="breakbulk-bytotal-total-volume" class="total-volume-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="breakbulk-bytotal-total-weight" class="total-weight-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit">KGS</span>
                                                    <input type="hidden" name="breakbulk-bytotal-total-volume-weight" class="total-volume-weight-value">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="cargo-item-details by-packages" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="repeating">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="repeating-header">
                                                            <p class="padded blue-text">
                                                                PACKAGE #<span class="number"></span>
                                                            </p>
                                                            <button type="button" class="remove">- Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Quantity</label>
                                                            <input type="text" name="breakbulk-bypackages-quantity[]" placeholder="Package Quantity" autocomplete="off" required="" class="numbers-format min-number quantity-number number-input-value" min="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Package Type</label>
                                                            <input type="text" name="breakbulk-bypackages-type[]" placeholder="Package Type" autocomplete="off" required="" class="letters-format">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Length:</label>
                                                            <input type="text" name="breakbulk-bypackages-length[]" placeholder="Length" class="numbers-format length-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="breakbulk-bypackages-length-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Width:</label>
                                                            <input type="text" name="breakbulk-bypackages-width[]" placeholder="Width" class="numbers-format width-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="breakbulk-bypackages-width-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Height:</label>
                                                            <input type="text" name="breakbulk-bypackages-height[]" placeholder="Height" class="numbers-format height-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker unit-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="breakbulk-bypackages-height-unit[]" class="fake-input floating-label" value="(IN)"  data-unit="IN">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(IN)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(IN)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-units="IN" class="active">(IN)</li>
                                                                            <li data-units="FT">(FT)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Weight:</label>
                                                            <input type="text" name="breakbulk-bypackages-weight[]" placeholder="Weight" class="numbers-format weight-data dimension-number number-input-value min-number" autocomplete="off" min="1" required="">
                                                            <div class="has-select-picker weight-selection opacity-select">
                                                                <div class="fake-select">
                                                                    <input type="hidden" name="breakbulk-bypackages-weight-unit[]" class="fake-input floating-label" value="(KGS)" data-weight="KGS">
                                                                    <div class="fake-input-text not-empty">
                                                                        <p>(KGS)</p>
                                                                    </div>
                                                                    <div class="fake-select-picker" style="display: none;">
                                                                        <div class="fake-input">
                                                                            <p>(KGS)</p>
                                                                        </div>
                                                                        <ul>
                                                                            <li data-weights="KGS" class="active">(KGS)</li>
                                                                            <li data-weights="LBS">(LBS)</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Make</label>
                                                            <input type="text" name="breakbulk-bypackages-make[]" placeholder="Make (Optional)" class="letters-numbers-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="quote-form-group">
                                                            <label>Model Number</label>
                                                            <input type="text" name="breakbulk-bypackages-model[]" placeholder="Modal Number (Optional)" class="models-format" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="quote-form-group">
                                                            <label>Package Description:</label>
                                                            <textarea name="breakbulk-bypackages-package-description[]" placeholder="Enter Package Description*"  autocomplete="off" required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row total-container" id="breakbulk-by-packages" style="display: none;">
                                        <div class="col-md-12">
                                            <div class="total-computation">
                                                <div class="total-items">
                                                    <span class="total-title">Total Packages:</span>
                                                    <span class="total-number total-quantity">0</span>
                                                    <input type="hidden" name="breakbulk-bypackages-total-quantity" class="total-quantity-value">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume:</span>
                                                    <span class="total-number total-volume">0</span>
                                                    <span class="total-unit total-volume-unit">FT<sup>3</sup></span>
                                                    <input type="hidden" name="breakbulk-bypackages-total-volume" class="total-volume-value">
                                                    <input type="hidden" name="breakbulk-bypackages-total-volume-unit" class="total-volume-value-unit" value="FT">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Weight:</span>
                                                    <span class="total-number total-weight">0</span>
                                                    <span class="total-unit total-weight-unit">KGS</span>
                                                    <input type="hidden" name="breakbulk-bypackages-total-weight" class="total-weight-value">
                                                    <input type="hidden" name="breakbulk-bypackages-total-weight-unit" class="total-weight-value-unit" value="KGS">
                                                </div>
                                                <div class="total-items">
                                                    <span class="total-title">Total Volume Weight:</span>
                                                    <span class="total-number total-volume-weight">0</span>
                                                    <span class="total-unit total-volume-weight-unit">KGS</span>
                                                    <input type="hidden" name="breakbulk-bypackages-total-volume-weight" class="total-volume-weight-value">
                                                    <input type="hidden" name="breakbulk-bypackages-total-volume-weight-unit" class="total-volume-weight-value-unit" value="KGS">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-form-group button-steps pull-right">
                                            <button type="button" class="add-container" id="add-container" style="opacity: 0;" data-hover="+ Add Another Package"><span>+ Add Another Package</span></button>
                                            <button type="button" class="next-step submit-step" data-hover="Submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="warehousing" class="selected-service" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-text-heading">
                                            <h3>Warehousing</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="cargo-item-details">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="quote-form-group has-select-picker warehousing-details">
                                                <label>Warehouse Services</label>
                                                <div class="fake-select">
                                                    <input type="hidden" name="warehousing-services" class="fake-input floating-label" required="" readonly="readonly" data-warehousing-service="">
                                                    <div class="fake-input-text required">
                                                        <p>Warehouse Services</p>
                                                    </div>
                                                    <div class="fake-select-picker" style="display: none;">
                                                        <div class="fake-input">
                                                            <label>Warehouse Services</label>
                                                            <p></p>
                                                        </div>
                                                        <ul>
                                                            <li data-warehousing-services="Reception of containers">Reception of containers</li>
                                                            <li data-warehousing-services="Reception of transport">Reception of transport</li>
                                                            <li data-warehousing-services="Cargo storage">Cargo storage</li>
                                                            <li data-warehousing-services="Vehicle loading">Vehicle loading</li>
                                                            <li data-warehousing-services="Bonded Warehouse">Bonded Warehouse</li>
                                                            <li data-warehousing-services="Transloading">Transloading</li>
                                                            <li data-warehousing-services="Container Consolidation">Container Consolidation</li>
                                                            <li data-warehousing-services="Cross Dock / Transshipping">Cross Dock / Transshipping</li>
                                                            <li data-warehousing-services="Repackaging">Repackaging</li>
                                                            <li data-warehousing-services="Container reception and unloading">Container reception and unloading</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="quote-form-group">
                                                <label>Specify Additional Information:</label>
                                                <textarea name="warehousing-specify-description" placeholder="Specify Additional Information:" autocomplete="off" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="quote-form-group button-steps pull-right">
                                            <button type="button" class="next-step submit-step" data-hover="Submit"><span>Submit</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="quote-thankyou" style="display: none;">
                <div class="quote-thankyou-img-holder"></div>
                <div class="quote-thankyou-content">
                    <h3>Thank You!</h3>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                    <a href="/" class="home-quote">HOME</a>
                </div>
            </div>
        </div>
    </div>
    <?php
}