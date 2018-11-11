<p>
    Olá {{$interview->candidate->name}},
</p>

<p>
    Sua entrevista foi remarcada para {{\Carbon\Carbon::parse($interview->appointment)->format('d M Y').' às '.\Carbon\Carbon::parse($interview->appointment)->format('G:i')}}
</p>

<p>
    Aguardamos sua presença.
</p>

<hr>

<p>
    Hello {{$interview->candidate->name}},
</p>

<p>
    Your interview was rescheduled for {{\Carbon\Carbon::parse($interview->appointment)->format('d M Y').' at '.\Carbon\Carbon::parse($interview->appointment)->format('g:i A')}}
</p>

<p>
    We look forward to your presence.
</p>

                 