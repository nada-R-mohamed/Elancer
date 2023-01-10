<x-app-layout>
    <x-slot name="title">My Account</x-slot>

    <!-- Row -->
    <div class="row">
        <form action="{{ route('freelancer.profile.edit') }}" method="post">
            @csrf
            @method('put')

            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div class="dashboard-box margin-top-0">

                    <!-- Headline -->
                    <div class="headline">
                        <h3><i class="icon-material-outline-account-circle"></i> My Account</h3>
                    </div>

                    <div class="content with-padding padding-bottom-0">

                        <div class="row">

                            <div class="col-auto">
                                <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                                    <img class="profile-pic" src="images/user-avatar-placeholder.png" alt="" />
                                    <div class="upload-button"></div>
                                    <input class="file-upload" type="file" accept="image/*" />
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>First Name</h5>
                                            <input type="text" class="with-border" name="first_name"
                                                value="{{ $profile->first_name }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Last Name</h5>
                                            <input type="text" class="with-border" name="last_name"
                                                value="{{ $profile->last_name }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <!-- Account Type -->
                                        <div class="submit-field">
                                            <h5>Account Type</h5>
                                            <div class="account-type">
                                                <div>
                                                    <input type="radio" name="account-type-radio"
                                                        id="freelancer-radio" class="account-type-radio" checked />
                                                    <label for="freelancer-radio" class="ripple-effect-dark"><i
                                                            class="icon-material-outline-account-circle"></i>
                                                        Freelancer</label>
                                                </div>

                                                <div>
                                                    <input type="radio" name="account-type-radio" id="employer-radio"
                                                        class="account-type-radio" />
                                                    <label for="employer-radio" class="ripple-effect-dark"><i
                                                            class="icon-material-outline-business-center"></i>
                                                        Employer</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Email</h5>
                                            <input type="text" class="with-border" name="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div class="dashboard-box">

                    <!-- Headline -->
                    <div class="headline">
                        <h3><i class="icon-material-outline-face"></i> My Profile</h3>
                    </div>

                    <div class="content">
                        <ul class="fields-ul">
                            <li>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <div class="bidding-widget">
                                                <!-- Headline -->
                                                <span class="bidding-detail">Set your <strong>minimal hourly
                                                        rate</strong></span>

                                                <!-- Slider -->
                                                <div class="bidding-value margin-bottom-10">$<span
                                                        id="biddingVal"></span>
                                                </div>
                                                <input class="bidding-slider" type="text"
                                                    value="{{ $profile->hourly_rate }}" data-slider-handle="custom"
                                                    data-slider-currency="$" data-slider-min="5" data-slider-max="150"
                                                    name="hourly_rate" data-slider-value="{{ $profile->hourly_rate }}"
                                                    data-slider-step="1" data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Skills <i class="help-icon" data-tippy-placement="right"
                                                    title="Add up to 10 skills"></i></h5>

                                            <!-- Skills List -->
                                            <div class="keywords-container">
                                                <div class="keyword-input-container">
                                                    <input type="text" class="keyword-input with-border"
                                                        placeholder="e.g. Angular, Laravel" />
                                                    <button class="keyword-input-button ripple-effect"><i
                                                            class="icon-material-outline-add"></i></button>
                                                </div>
                                                <div class="keywords-list">
                                                    <span class="keyword"><span class="keyword-remove"></span><span
                                                            class="keyword-text">Angular</span></span>
                                                    <span class="keyword"><span class="keyword-remove"></span><span
                                                            class="keyword-text">Vue JS</span></span>
                                                    <span class="keyword"><span class="keyword-remove"></span><span
                                                            class="keyword-text">iOS</span></span>
                                                    <span class="keyword"><span class="keyword-remove"></span><span
                                                            class="keyword-text">Android</span></span>
                                                    <span class="keyword"><span class="keyword-remove"></span><span
                                                            class="keyword-text">Laravel</span></span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4">
                                        <div class="submit-field">
                                            <h5>Attachments</h5>

                                            <!-- Attachments -->
                                            <div class="attachments-container margin-top-0 margin-bottom-0">
                                                <div class="attachment-box ripple-effect">
                                                    <span>Cover Letter</span>
                                                    <i>PDF</i>
                                                    <button class="remove-attachment" data-tippy-placement="top"
                                                        title="Remove"></button>
                                                </div>
                                                <div class="attachment-box ripple-effect">
                                                    <span>Contract</span>
                                                    <i>DOCX</i>
                                                    <button class="remove-attachment" data-tippy-placement="top"
                                                        title="Remove"></button>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>

                                            <!-- Upload Button -->
                                            <div class="uploadButton margin-top-0">
                                                <input class="uploadButton-input" type="file"
                                                    accept="image/*, application/pdf" id="upload" multiple />
                                                <label class="uploadButton-button ripple-effect" for="upload">Upload
                                                    Files</label>
                                                <span class="uploadButton-file-name">Maximum file size: 10 MB</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Tagline</h5>
                                            <input type="text" class="with-border" name="title"
                                                value="{{ $profile->title }}">
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="submit-field">
                                            <h5>Nationality</h5>
                                            <select name="country" class="selectpicker with-border" data-size="7"
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
                                                    Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                                </option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The
                                                    Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote Divoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                                </option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
                                                </option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and
                                                    Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City
                                                    State)</option>
                                            </select>
                                            {{--  <x-country-select :selected="$profile->country" />  --}}
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="submit-field">
                                            <h5>Introduce Yourself</h5>
                                            <textarea cols="30" rows="5" name="description" class="with-border">{{ $profile->description }}</textarea>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Dashboard Box -->
            <div class="col-xl-12">
                <div id="test1" class="dashboard-box">

                    <!-- Headline -->
                    <div class="headline">
                        <h3><i class="icon-material-outline-lock"></i> Password & Security</h3>
                    </div>

                    <div class="content with-padding">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Current Password</h5>
                                    <input type="password" class="with-border">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>New Password</h5>
                                    <input type="password" class="with-border">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Repeat New Password</h5>
                                    <input type="password" class="with-border">
                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="checkbox">
                                    <input type="checkbox" id="two-step" checked>
                                    <label for="two-step"><span class="checkbox-icon"></span> Enable Two-Step
                                        Verification
                                        via Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="col-xl-12">
                <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
            </div>
        </form>
    </div>

    <!-- Row / End -->


</x-app-layout>
