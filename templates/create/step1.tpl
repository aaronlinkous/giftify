
<div class="row">
    <p>First, we just need some basic information about your event and then we'll ask about you and your guests.</p>
</div>

<form data-validate="parsley" novalidate action="/create/step/2/" method="POST">
    <div class="row split">
        <div>
            <input class="check_val" id="name" name="name" type="text" placeholder="Event Name" required="required" data-trigger="keyup" />
        </div>

        <div>
            <input class="check_val" id="location" name="date" type="text" placeholder="Event Location" required="required" data-trigger="keyup" />
        </div>
    </div>

    <div class="row split">
        <div>
            <input class="check_val" id="date" name="date" type="text" placeholder="Event Date" required="required" data-trigger="change" />
        </div>

        <div>
            <input class="check_val" id="time" name="time" type="text" placeholder="Event Time" required="required" data-trigger="change" />
        </div>

        <div>
            <select placeholder="Event Type" class="check_val background is_valid" required="required" data-trigger="change">
                <option value="">Event Type</option>
                <option value="ss" selected>Secret Santa</option>
                <option value="we">White Elephant</option>
            </select>
        </div>
    </div>

    <div class="row extra_margin">
        <label class="custom">
            <input id="private" tabindex="-1" name="privacy" type="radio" checked /><span></span> Private Event
        </label>

        <label class="custom disabled">
            <input id="public" tabindex="-1" name="privacy" type="radio" disabled /><span></span> Public Event (Coming Soon!)
        </label>
    </div>

    <div class="row">
        <button class="validate centered cta">Create Event</button>
    </div>
</form>