<div class="row">
    <p>Now just tell us about yourself and then invite some guests to the party.</p>
</div>

<form data-validate="parsley" novalidate>
    <div class="row extra_margin">
        <label class="custom">
            <input id="new" tabindex="-1" name="user" type="radio" data-toggle="new_user" checked /><span></span> I am a New User
        </label>

        <label class="custom">
            <input id="existing" tabindex="-1" name="user" type="radio" data-toggle="new_user" /><span></span> I already have an Account
        </label>
    </div>

    <section id="new_user" class="row full_width">
        <div class="row split">
            <div>
                <input class="check_val" id="fname" name="fname" type="text" placeholder="First Name" required="required" data-trigger="keyup" />
            </div>

            <div>
                <input class="check_val" id="lname" name="lname" type="text" placeholder="Last Name" required="required" data-trigger="keyup" />
            </div>
        </div>
    </section>

    <div class="row split">
        <div>
            <input class="check_val" name="email" type="email" placeholder="Email" required="required" data-trigger="blur" />
        </div>

        <div>
            <input class="check_val" name="password" type="password" placeholder="Password" data-minlength="6" required="required" data-trigger="blur" />
        </div>
    </div>

    <div class="row half_margin" id="email_upload">
        <input type="file" id="email_upload_submit_me" class="check_val" />
    </div>

    <div class="row center">
        <a href="#emails" class="detail" data-toggle="man_email">enter emails manually</a>
    </div>

    <div id="man_email" class="row not_visible">
        <textarea name="emails" id="emails" class="check_val" placeholder="Guest's Email Addresses (seperated by a comma or space)" required="required" data-trigger="blur"></textarea>
    </div>

    <div class="row">
        <button class="validate centered cta">Submit</button>
    </div>

</form>