<html>
<body style="
    background: rgb(41, 81, 41,0.7);
    color: #ffffff;
    width: 100%;
    padding: 20px 5px;
    font-size: 1.5rem;
">
<h3 style="color: #ffffff;">Hi Renewal Project,</h3>
<h3 style="color: #ffffff;">
    You have a new contact form message:
</h3>

<table 
    cellpadding='15' 
    cellspacing='0' 
    border='0'
    style="
        width: 95%;
    "
>
    
    <thead>
        <tr>
            <th colspan='4'>Customer Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan='2'>Name:</td>
            <td colspan='2'>{{$newEnquiryData->name}}</td>
        </tr>
        <tr>
            <td colspan='2'>Email:</td>
            <td colspan='2'>{{$newEnquiryData->email}}</td>
        </tr>
        <tr>
            <td colspan='2'>Subject:</td>
            <td colspan='2'>{{$newEnquiryData->subject}}</td>
        </tr>
        <tr>
            <td colspan='2'>Enquiry:</td>
            <td colspan='2'>{{$newEnquiryData->data}}</td>
        </tr>
    </tbody>
    @if ($newEnquiryData->image)
        <p>There is an image attached</p>
        <img src="{{ $message->embed(($newEnquiryData->image)) }}" max-width="300px" height="300px">
    @endif
</table>

</body>
</html>