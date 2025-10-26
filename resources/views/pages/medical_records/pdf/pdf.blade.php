<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Patient Information</title>
    <style>
        :root {
            --page-width: 900px;
            --accent: #000;
            --muted: #333;
            --label-size: 16px;
            --input-height: 28px;
        }

        /* page layout */
        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
            background: #fafafa;
            color: var(--muted);
            display: flex;
            justify-content: center;
            padding: 32px 20px;
        }

        .sheet {
            width: min(var(--page-width), 96vw);
            background: #fff;
            padding: 28px 40px 40px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.06);
            border-radius: 4px;
            box-sizing: border-box;
        }

        h1.title {
            text-align: center;
            font-size: 20px;
            margin: 6px 0 16px;
            letter-spacing: -0.5px;
        }

        hr.thin {
            border: none;
            border-top: 2px solid #111;
            margin: 12px 0 22px;
        }

        .section {
            margin-bottom: 18pt;
        }

        .section h2 {
            font-size: 18px;
            margin: 10px 0 14px;
            color: #000;
        }

        /* form grid and fields */
        .form-row {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px 16px;
            align-items: center;
            margin-bottom: 8px;
        }

        /* two column variants */
        .two-col {
            grid-template-columns: 1fr 320px;
        }

        .three-col {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .label {
            font-size: var(--label-size);
            margin-bottom: 4px;
            display: inline-block;
        }

        /* underlined inputs to mimic paper form */
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            box-sizing: border-box;
            border: none;
            border-bottom: 2px solid #111;
            padding: 6px 4px;
            font-size: 14px;
            outline: none;
            height: var(--input-height);
            background: transparent;
        }

        textarea {
            min-height: 52px;
            padding-top: 8px;
            padding-bottom: 8px;
            resize: vertical;
        }

        /* inline small input (age, short fields) */
        .short {
            width: 120px;
            display: inline-block;
            border-bottom: 2px solid #111;
            padding: 6px 4px;
        }

        /* checkboxes row */
        .checkbox-group {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            align-items: center;
        }

        .checkbox {
            display: inline-flex;
            gap: 6px;
            align-items: center;
            font-size: 14px;
        }

        .checkbox input {
            width: 16px;
            height: 16px;
        }

        /* two-line labels like "Full Name ______ Age" */
        .line-with-right {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .line-with-right .stretch {
            flex: 1;
        }

        .line-with-right .right {
            width: 150px;
            display: flex;
            gap: 8px;
            align-items: center;
        }

        /* thin separator line like the sample image */
        .sep {
            border-top: 1px solid #ccc;
            margin: 14px 0;
        }

        /* appointment details style */
        .wide-input {
            grid-column: 1 / -1;
        }

        /* responsive tweaks */
        @media (max-width:760px) {

            .two-col,
            .three-col {
                grid-template-columns: 1fr;
            }

            .right {
                width: auto;
            }
        }

        /* visual emphasis for section numbers */
        .section h2::before {
            content: "";
            display: inline-block;
            width: 0;
            margin-right: 8px;
        }

        /* small helper styling for placeholders */
        .hint {
            font-size: 12px;
            color: #666;
            margin-left: 6px;
        }
    </style>
</head>

<body>
    <div class="sheet" role="main">
        <h1 class="title">Patient Information</h1>
        <hr class="thin">

        <form>

            <!-- I. Personal Details -->
            <div class="section" id="personal">
                <h2>I. Personal Details</h2>

                <div class="form-row line-with-right">
                    <div class="stretch">
                        <label class="label">Full Name</label>
                        <input type="text" value="{{ $patient->fname . ' ' . $patient->mname ?? '' . ' ' . $patient->lname }}" readonly>
                    </div>
                    <div class="right">
                        <label class="label" style="min-width:48px;">Age</label>
                        <input class="short" type="text" value="{{ $age }}" readonly>
                    </div>
                </div>

                <div class="form-row two-col">
                    <div>
                        <label class="label">Date of Birth</label>
                        <input type="date" value="{{ $patient->dob }}">
                    </div>
                    <div>
                        <label class="label">Gender</label>
                        <div class="checkbox-group" role="group" aria-label="gender">
                            @foreach (['male', 'female'] as $m)
                                <label class="checkbox"><input readonly type="checkbox" {{ $patient->gender === $m ? 'checked' : '' }}>{{ $m }}</label>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <label class="label">Civil Status</label>
                    <div class="checkbox-group">

                        @foreach (['married', 'divored', 'widowed', 'single'] as $c)
                            <label class="checkbox"><input type="checkbox" {{ $patient->civil == $c ? 'checked' : '' }}>{{ ucfirst($c) }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="form-row">
                    <label class="label">Address</label>
                    <input type="text" value="{{ $patient->address }}" readonly>
                </div>

                <div class="form-row two-col">
                    <div>
                        <label class="label">Contact Number</label>
                        <input type="tel" value="{{ $patient->contactno }}" readonly>
                    </div>
                    <div>
                        <label class="label">Email Address</label>
                        <input type="email" value="{{ $patient->email }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <label class="label">PhilHealth / National ID No.</label>
                    <input type="text" value="{{ $patient->idno }}" readonly>
                </div>
            </div>

            <div class="sep"></div>

            <!-- II. Emergency Contact -->
            <div class="section" id="emergency">
                <h2>II. Emergency Contact Information</h2>

                <div class="form-row two-col">
                    <div>
                        <label class="label">Contact Name</label>
                        <input type="text" value="{{ $patient->e_contact }}">
                    </div>
                    <div>
                        <label class="label">Relationship</label>
                        <input type="text" value="{{ $patient->relationship }}">
                    </div>
                </div>

                <div class="form-row">
                    <label class="label">Contact Number</label>
                    <input type="tel" value="{{ $patient->e_number }}">
                </div>
            </div>

            <div class="sep"></div>

            <!-- III. Medical History -->
            <div class="section" id="medical">
                <h2>III. Medical History</h2>

                <div class="form-row">
                    <label class="label">Blood Type</label>
                    <div class="checkbox-group">
                        @foreach (['A', 'A-', 'B', 'B-', 'AB', 'AB-', 'O', 'O+', 'unknown'] as $b)
                            <label class="checkbox"><input type="checkbox" {{ $patient->blood_type == $b ? 'checked' : '' }}>{{ $b }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="form-row">
                    <label class="label">Known Allergies</label>
                    <input type="text"
                        value="{{ $patient->allergies ? implode(', ', $patient->allergies) : '' }}"
                    readonly>
                </div>

                <div class="form-row">
                    <label class="label">Current Medications</label>
                    <input type="text" value="{{ $patient->medications ? implode(', ', $patient->medications) : 'None' }}" readonly>
                </div>

                <div class="form-row">
                    <label class="label">Previous Surgeries / Major Illnesses</label>
                    <input type="text" value="{{ $patient->previous_illness ? implode(', ', $patient->previous_illness) : 'None' }}" readonly>
                </div>

                
            </div>

            <div class="sep"></div>

            <!-- IV. Lifestyle Information -->
            <div class="section" id="lifestyle">
                <h2>IV. Lifestyle Information</h2>

                <div class="form-row three-col">
                    <div>
                        <label class="label">Do you smoke?</label>
                        <div class="checkbox-group">
                            <label class="checkbox"><input type="checkbox" {{ $patient->smoke ? 'checked' : '' }}> Yes</label>
                            <label class="checkbox"><input type="checkbox" {{ !$patient->smoke ? 'checked' : '' }}> No</label>
                        </div>
                    </div>

                    
                </div>
            </div>

            <div class="sep"></div>

            <!-- VI. Appointment Details (note: original image uses VI) -->
            {{-- <div class="section" id="appointment">
                <h2>VI. Appointment Details</h2>

                <div class="form-row">
                    <label class="label">Preferred Doctor / Specialist</label>
                    <input type="text" name="preferred_doctor" placeholder="">
                </div>

                <div class="form-row">
                    <label class="label">Reason for Visit</label>
                    <textarea name="reason" placeholder=""></textarea>
                </div>
            </div>

            <div style="margin-top:16px; display:flex; justify-content:space-between; align-items:center;">
                <div style="font-size:14px; color:#555;">Signature: ____________________________</div>
                <button type="submit"
                    style="background:#111;color:#fff;padding:10px 16px;border:none;border-radius:4px;font-size:15px;">Submit</button>
            </div> --}}

        </form>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        alert("Before printing: click 'more settings' and disable 'Headers and Footers' and also enable 'Background Graphics' for best results.");

        window.print();

        window.onafterprint = () => {
            window.close();
        };


    });
</script>

</html>