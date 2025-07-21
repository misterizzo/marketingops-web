<?php
/**
 * This file is used for templating the platform profile registration for loggedin members.
 *
 * @since 1.0.0
 * @package Marketing_Ops_Core
 * @subpackage Marketing_Ops_Core/public/partials/templates/woocommerce/myaccount
 */

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.
?>
<form>
    <section class="agencyformone">
        <h1>General</h1>
        <div class="agencyformgroup">
            <label>Platform name <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></label>
            <input type="text" class="agancyinputbox" id="agencyname" name="agencyname">
            <small>This will be how your name will be displayed in the account section</small>
        </div> 

        <div class="agencyformgroup logoupload">
            <label>Logo <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></label>
            <div class="upload-btn-wrapper">
                <button class="btn">Select an image</button>
                <p>For the best results, upload horizontal version, 560 x 240px max</p>
                <input type="file" name="myfile" />
            </div>
        </div>

        <div class="agencyformgroup">
            <label>Description </label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
            <small>0 of 400 max character</small>    
        </div>

        <h2>Contact</h2>
        <div class="agencyformgroups">
            <div class="agencyfirstblock">
                <label>Name</label>
                <input type="text" class="agancyinputbox" id="name" name="name">
            </div> 
            <div class="agencyfirstblock">
                <label>E-mail</label>
                <input type="email" class="agancyinputbox" id="email" name="email">
            </div>    
        </div>
        <div class="agencyformgroup">
            <label>Agency Website <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></label>
            <input type="text" class="agancyinputbox" id="agencywebsite" name="agencywebsite">
        </div>
    </section>

    <section class="agencyformone detailsblock">
        <h3>Details</h3>
        <h5>Type of the Platform</h5>
        <p>
            <input type="radio" id="affiliate" name="radio-group" checked>
            <label for="affiliate">Affiliate
            </label>
        </p>
        <p>
            <input type="radio" id="consultant" name="radio-group">
            <label for="consultant">Amazon
            </label>
        </p>
        <p>
            <input type="radio" id="digital" name="radio-group">
            <label for="digital">Branded Content
            </label>
        </p>
        <p>
            <input type="radio" id="holding" name="radio-group">
            <label for="holding">Call Tracking
            </label>
        </p>
        <p>
            <input type="radio" id="influencer" name="radio-group">
            <label for="influencer">Influencer
            </label>
        </p>
        <p>
            <input type="radio" id="PR" name="radio-group">
            <label for="PR">Lead Cen
            </label>
        </p>
        <p>
            <input type="radio" id="Reddit" name="radio-group">
            <label for="Reddit">Publisher Tech
            </label>
        </p>
        <p>
            <input type="radio" id="Search" name="radio-group">
            <label for="Search">SMS
            </label>
        </p>

        <h5 style="margin-top: 30px !important;">What services do you provide?  <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></h5>
        <div class="agencyformgroup form-group">
            <input type="checkbox" id="Integration">
            <label for="Integration">Program Set up & Integration</label>
        </div>
        <div class="agencyformgroup form-group">
            <input type="checkbox" id="Services">
            <label for="Services">Full Managed Services</label>
        </div>
        <div class="agencyformgroup form-group">
            <input type="checkbox" id="Onboarding">
            <label for="USOnboarding">Publisher Recruitment & Onboarding</label>
        </div>
        <button class="addregion">Add new choice</button>

        

        <div class="agencyformgroup withselect" style="margin-top:30px;">
            <label>Do you have a publisher network?</label>
            <select>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>

        <div class="agencyformgroup withselect">
            <label>Do you execute payments to publishers on behalf of your advertisers?  <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></label>
                <select>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
        </div>
        <div class="agencyformgroups withoutmargin">
            <div class="agencyfirstblock">
                <label>Agency Certification Program?</label>
                <select>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div> 
            <div class="agencyfirstblock">
                <label>Agency Support Team?</label>
                <select>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
            </div>    
        </div>

        <div class="contactlist">
        <h4>Contact</h4>
        <div class="agencyformgroups">
            <div class="agencyfirstblock">
                <label>Name</label>
                <input type="text" class="agancyinputbox" id="fullnmame" name="fullnmame">
            </div> 
            <div class="agencyfirstblock">
                <label>E-mail</label>
                <input type="text" class="agancyinputbox" id="position" name="position">
            </div>    
        </div>
        </div>
        <div class="agencyformgroup">
            <label>Platform Website <i><svg xmlns="http://www.w3.org/2000/svg" width="9" height="21" viewBox="0 0 9 21" fill="none"><path d="M3.2 6H5.45L5.325 8.675L7.55 7.275L8.675 9.175L6.3 10.425L8.65 11.725L7.525 13.6L5.325 12.175L5.425 14.7H3.175L3.325 12.2L1.2 13.55L0.075 11.65L2.325 10.4L0 9.125L1.15 7.225L3.325 8.6L3.2 6Z" fill="url(#paint0_linear_34_3644)"/><defs><linearGradient id="paint0_linear_34_3644" x1="-0.204631" y1="10.371" x2="13.798" y2="10.371" gradientUnits="userSpaceOnUse"><stop stop-color="#FD4B7A"/><stop offset="1" stop-color="#4D00AE"/></linearGradient></defs></svg></i></label>
            <input type="text" class="agancyinputbox" id="person" name="person">
        </div>
    </section>

    <section class="agencyformone mentions">
        <h6 class="special">Special mentions</h6>
        <div class="agencyformgroup videogroup articals" style="margin-top:0;">
        <h5>Testimonial</h5>
            <label>Text </label>
            <textarea id="Text" name="Text" rows="4" cols="50"></textarea>
            <small>0 of 400 max character</small>    
        </div>

        <div class="agencyformgroup person">
            <label>Name of the person quoted </label>
            <input type="text" class="agancyinputbox" id="person" name="person">
        </div>

        <div class="agencyformgroup videogroup articals">
        <h5>Clients</h5>
            <label>Text </label>
            <textarea id="Text" name="Text" rows="4" cols="50"></textarea>
            <small> list as many as you want</small>    
        </div>

        <div class="agencyformgroup videogroup articals">
        <h5>Certifications</h5>
            <label>Text </label>
            <textarea id="Text" name="Text" rows="4" cols="50"></textarea>
            <small> list as many as you want</small>    
        </div>

        <div class="agencyformgroup videogroup articals">
        <h5>Awards</h5>
            <label>Text </label>
            <textarea id="Text" name="Text" rows="4" cols="50"></textarea>
            <small> Please list one award per line to create a list</small>    
        </div>
        
        <div class="agencyformgroup videogroup">
        <h6 class="jbtitle">Video</h6>
            <label>Youtube / Vimeo link </label>
            <input type="text" class="agancyinputbox" id="Video" name="Video">
        </div>

        <h6 class="jbtitle">Articles & Press Releses</h6>
        <div class="agencyformgroup form-group">
            <input type="checkbox" id="jobs">
            <label for="jobs">Include articles & press releases posted by me to this page</label>
        </div>
    </section> 

    <section class="agencyformone">
        <ul>
            <li>
                <a href="javascript:void(0);" class="savedratbtn">
                    Save Draft
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="profilebtn">
                    Create Profile
                </a>
            </li>
        </ul>
    </section>
</form>