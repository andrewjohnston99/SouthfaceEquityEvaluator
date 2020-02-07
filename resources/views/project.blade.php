@extends('common.default')

@section('title', 'Project')

@section('css')
    <style>
        html, body {
            margin-top: 0;
        }
    </style> 
@endsection

@section('content')

    @include('common.project-header')

    <div id="genEquity" class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center align-middle font-weight-bold" colspan="2">GENERAL EQUITY</td>
                    <td>Points</td>
                    <td>Planned</td>
                    <td>Achieved</td>
                    <td>Confirmation Documents</td>
                    <td>Notes: DATE</td>
                </tr>
                <tr class="table-info">
                    <th scope="col" colspan="7">OPTIONAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">GE 1.0</th>
                    <td>Specialized Housing (Senior, Assisted Living, Transitional)</td>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">GE 1.1</th>
                    <td>Lifecycle Housing (raising children through aging in place)</td>
                    <td>15</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">GE 1.2</th>
                    <td>Interim uses</td>
                    <td>10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">GE 1.3</th>
                    <td>Small scale development that fosters hyper local economic development.</td>
                    <td>15</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">GE 1.4</th>
                    <td>Permanent Housing</td>
                    <td>20</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">GE 1.5</th>
                    <td>Car sharing program (e.g. ZipCar)</td>
                    <td>5+</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="table-secondary">
                    <td colspan="3">GENERAL EQUITY TOTAL</td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div id="services" class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td class="text-center align-middle font-weight-bold" colspan="2">SERVICES AND EMPLOYMENT</td>
                    <td>Points</td>
                    <td>Planned</td>
                    <td>Achieved</td>
                    <td>Confirmation Documents</td>
                    <td>Notes: DATE</td>
                </tr>
                <tr class="table-warning">
                    <th scope="col" colspan="7">REQUIRED</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" rowspan="4">SE 0.1</th>
                </tr>
                <tr>
                    <td>Protect Local services</td>
                    <td class="text-center" colspan="3">Select All:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">A.</span>Existing Survey</td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">B.</span>Deed Restrictions</td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row" rowspan="4">SE 0.2</th>
                </tr>
                <tr>
                    <td>Security</td>
                    <td class="text-center" colspan="3">Select All:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">A.</span>Lighting </td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">B.</span>Street Orientation</td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td class="text-center">-</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th class="table-info" colspan="7">OPTIONAL</th>
                </tr>
                <tr>
                    <th scope="row" rowspan="21">SE 1.0</th> 
                    <td>Services</td>
                    <td class="text-center" colspan="3">Select All:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">1</span>Grocery Store (credit for unleased space)</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">2</span>School</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">3</span>Adult/Senior Care Facility</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">4</span>Children Day Care Facility (credit for unleased space)</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">5</span>Membership Gym/YMCA (credit for unleased space)</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">6</span>Community Recreational Facility (ie: pool, softball park, etc.)</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">7</span>Cultural Facility (museum or performing arts center)</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">8</span>Library</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">9</span>Fire Station</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">10</span>Police Station</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">11</span>Commercial Space (e.g. retail)(credit for unleased space)</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>    
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">12</span>Bank</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">13</span>Laundry</td>
                    <td class="text-center">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">14</span>Convenience Store</td>
                    <td class="text-center">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>   
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">15</span>Hardware Store</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">16</span>Post Office</td>
                    <td class="text-center">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">17</span>Medical Clinic</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">18</span>Theater</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">19</span>Social Services</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">20</span>Pharmacy (credit for unleased space)</td>
                    <td class="text-center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>SE 1.1</th>
                    <td>Employment Services</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>SE 1.2</th>
                    <td>Employment Opportunities<br>
                        <span class="font-weight-bold" style="margin-right: 30px;">A.</span>Alignment with Local Skills
                    </td>
                    <td class="text-center">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row" rowspan="5">SE 1.3</th>
                </tr>
                <tr>
                    <td>Open Space</td>
                    <td class="text-center" colspan="3">Select One:</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">A.</span>7%</td>
                    <td class="text-center">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">B.</span>15%</td>
                    <td class="text-center">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td><span class="font-weight-bold" style="margin-right: 30px;">C.</span>20%</td>
                    <td class="text-center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="table-secondary">
                    <td colspan="3">SERVICES AND EMPLOYMENT TOTAL</td>
                    <td></td>
                    <td></td>
                    <td colspan="2"></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection