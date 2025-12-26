<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2563EB;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 20px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #2563EB;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nieuw Contactbericht</h1>
        </div>

        <div class="content">
            <p>Er is een nieuw bericht ontvangen via het contactformulier:</p>

            <div class="field">
                <span class="label">Naam:</span> {{ $contact->name }}
            </div>

            <div class="field">
                <span class="label">Email:</span> {{ $contact->email }}
            </div>

            @if($contact->subject)
            <div class="field">
                <span class="label">Onderwerp:</span> {{ $contact->subject }}
            </div>
            @endif

            <div class="field">
                <span class="label">Bericht:</span><br>
                {{ $contact->message }}
            </div>

            <div class="field">
                <span class="label">Ontvangen op:</span> {{ $contact->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
    </div>
</body>
</html>
