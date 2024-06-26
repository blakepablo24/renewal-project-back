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
    You have a new {{$newEnquiryData->subject}} message:
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
            <td colspan='2'>{{$newEnquiryData->enquiryName}}</td>
        </tr>
        <tr>
            <td colspan='2'>Email:</td>
            <td colspan='2'>{{$newEnquiryData->enquiryEmail}}</td>
        </tr>
        <tr>
            <td colspan='2'>Phone:</td>
            <td colspan='2'>{{$newEnquiryData->enquiryPhone}}</td>
        </tr>
        <tr>
            <td colspan='2'>Subject:</td>
            <td colspan='2'>{{$newEnquiryData->subject}}</td>
        </tr>
        @if ($newEnquiryData->transportService)
            <tr>
                <td colspan='2'>Transport Service:</td>
                <td colspan='2'>{{$newEnquiryData->transportService}}</td>
            </tr>
            <tr>
                <td colspan='2'>Collection Address</td>
                <td colspan='2'>{{$newEnquiryData->enquiryCollectionAddress}}</td>
            </tr>
            @if ($newEnquiryData->enquiryDeliveryAddress)
                <tr>
                    <td colspan='2'>Delivery Address</td>
                    <td colspan='2'>{{$newEnquiryData->enquiryDeliveryAddress}}</td>
                </tr>
            @endif    
            <tr>
                <td colspan='2'>Date:</td>
                <td colspan='2'>{{$newEnquiryData->enquiryDate}}</td>
            </tr>
        @endif
        @if ($newEnquiryData->transportService)
            <tr>
                <td colspan='2'>Items to move</td>
                <td colspan='2'>{{$newEnquiryData->enquiryData}}</td>
            </tr>
        @else
            <tr>
                <td colspan='2'>Enquiry</td>
                <td colspan='2'>{{$newEnquiryData->enquiryData}}</td>
            </tr>
        @endif
    </tbody>
    @if ($newEnquiryData->image1)
        <p>There is an image attached</p>
        <img src="{{ $message->embed(($newEnquiryData->image1)) }}" max-width="300px" height="300px">
    @endif
    @if ($newEnquiryData->image2)
        <img src="{{ $message->embed(($newEnquiryData->image2)) }}" max-width="300px" height="300px">
    @endif
    @if ($newEnquiryData->image3)
        <img src="{{ $message->embed(($newEnquiryData->image3)) }}" max-width="300px" height="300px">
    @endif
    @if ($newEnquiryData->image4)
        <img src="{{ $message->embed(($newEnquiryData->image4)) }}" max-width="300px" height="300px">
    @endif
</table>

</body>
</html>