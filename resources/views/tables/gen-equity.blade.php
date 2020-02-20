<div id="genEquity" class="table-responsive">
    <table id="equityTable" class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th class="text-center align-middle font-weight-bold" colspan="2">GENERAL EQUITY</th>
                <th>Points</th>
                <th>Planned</th>
                <th>Achieved</th>
                <th>Confirmation Documents</th>
                <th>Notes: DATE</th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-info">
                <th class="text-center" scope="col" colspan="7">OPTIONAL</th>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.0</th>
                <td class="text-left">Specialized Housing (Senior, Assisted Living, Transitional)</td>
                <td>20</td>
                <td id="e10" class="editable">
                    <input id="e10-input" type="checkbox" />&nbsp;
                </td>
                <td id="f10" class="editable">
                    <input id="f10-input" type="checkbox" />&nbsp;
                </td>
                <td id="g10" class="editable">
                    <input id="g10-input" type="text" />&nbsp;
                </td>
                <td id="h10" class="editable">
                    <input id="h10-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.1</th>
                <td class="text-left">Lifecycle Housing (raising children through aging in place)</td>
                <td>15</td>
                <td id="e11" class="editable">
                    <input id="e11-input" type="checkbox" />&nbsp;
                </td>
                <td id="f11" class="editable">
                    <input id="f11-input" type="checkbox" />&nbsp;
                </td>
                <td id="g11" class="editable">
                    <input id="g11-input" type="text" />&nbsp;
                </td>
                <td id="h11" class="editable">
                    <input id="h11-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.2</th>
                <td class="text-left">Interim uses</td>
                <td>10</td>
                <td id="e12" class="editable">
                    <input id="e12-input" type="checkbox" />&nbsp;
                </td>
                <td id="f12" class="editable">
                    <input id="f12-input" type="checkbox" />&nbsp;
                </td>
                <td id="g12" class="editable">
                    <input id="g12-input" type="text" />&nbsp;
                </td>
                <td id="h12" class="editable">
                    <input id="h12-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.3</th>
                <td class="text-left">Small scale development that fosters hyper local economic development.</td>
                <td>15</td>
                <td id="e13" class="editable">
                    <input id="e13-input" type="checkbox" />&nbsp;
                </td>
                <td id="f13" class="editable">
                    <input id="f13-input" type="checkbox" />&nbsp;
                </td>
                <td id="g13" class="editable">
                    <input id="g13-input" type="text" />&nbsp;
                </td>
                <td id="h13" class="editable">
                    <input id="h13-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.4</th>
                <td class="text-left">Permanent Housing</td>
                <td>20</td>
                <td id="e14" class="editable">
                    <input id="e14-input" type="checkbox" />&nbsp;
                </td>
                <td id="f14" class="editable">
                    <input id="f14-input" type="checkbox" />&nbsp;
                </td>
                <td id="g14" class="editable">
                    <input id="g14-input" type="text" />&nbsp;
                </td>
                <td id="h14" class="editable">
                    <input id="h14-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="text-center">
                <th scope="row">GE 1.5</th>
                <td class="text-left">Car sharing program (e.g. ZipCar)</td>
                <td>5+</td>
                <td id="e15" class="editable">
                    <input id="e15-input" type="checkbox" />&nbsp;
                </td>
                <td id="f15" class="editable">
                    <input id="f15-input" type="checkbox" />&nbsp;
                </td>
                <td id="g15" class="editable">
                    <input id="g15-input" type="text" />&nbsp;
                </td>
                <td id="h15" class="editable">
                    <input id="h15-input" type="text" />&nbsp;
                </td>
            </tr>
            <tr class="table-secondary text-center">
                <td class="text-left" colspan="3">GENERAL EQUITY TOTAL</td>
                <td>{{ $equity_planned_total }}</td>
                <td>{{ $equity_actual_total }}</td>
                <td colspan="2"></td>
            </tr>
        </tbody>
    </table>
</div>
