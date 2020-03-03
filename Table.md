# Table Editing Instructions

Please make the following edits to the specified files. You don't need to start up Vagrant to make the edits. Just open the files in whatever code editor you prefer. Commit each file to github seperately with the commit message: **fix `<table name>` formatting and update for interactivity**. The general equity table is finished and can be used as reference. 

--- 

1. `/resources/views/tables/community.blade.php`
   * Replace the `<th>` Points, Planned, Achieved, Confirmation Documents, and Notes cells with the ones listed below in the *Table Head Classes* section
   * Add the `align-middle` class to all `<td>` elements in the Points, Planned, Achieved, Confirmation Documents, and Notes columns
   * Copy the `<textarea>` element below to the `<td>` cells in the Confirmation Documents and Notes columns
   * Add the `text-center` class to the last `<tr>` element in the file
   * Inside the last `<tr>` element, there are two `<td>` cells with 0 as the value. Add `id="comm_planned"` to the first `<td>` and `id="comm_actual"` to the second one
<br>
2. `/resources/views/tables/housing.blade.php`
   * Replace the `<th>` Points, Planned, Achieved, Confirmation Documents, and Notes cells with the ones listed below in the *Table Head Classes* section
   * Add the `align-middle` class to all `<td>` elements in the Points, Planned, Achieved, Confirmation Documents, and Notes columns
   * Copy the `<textarea>` element below to the `<td>` cells in the Confirmation Documents and Notes columns
   * Copy the checkbox element below to the `<td>` cells in the Planned and Achieved columns
   * Add the `text-center` class to the last `<tr>` element in the file
   * Inside the last `<tr>` element, there are two `<td>` cells with 0 as the value. Add `id="house_planned"` to the first `<td>` and `id="house_actual"` to the second one
<br>
3. `/resources/views/tables/physical.blade.php`
   * Replace all the `<td>` cells at the top of the document with the ones listed below in the *Table Head Classes - Physical* section
   * Add the `align-middle` class to all `<td>` elements in the Points, Planned, Achieved, Confirmation Documents, and Notes columns
   * Copy the `<textarea>` element below to the `<td>` cells in the Confirmation Documents and Notes columns
   * Add the `text-center` class to the last `<tr>` element in the file
   * Inside the last `<tr>` element, there are two `<td>` cells with 0 as the value. Add `id="phys_planned"` to the first `<td>` and `id="phys_actual"` to the second one
<br>
4. `/resources/views/tables/population.blade.php`
   * Replace the `<th>` Points, Planned, Achieved, Confirmation Documents, and Notes cells with the ones listed below in the *Table Head Classes* section
   * Add the `align-middle` class to all `<td>` elements in the Points, Planned, Achieved, Confirmation Documents, and Notes columns
   * Copy the `<textarea>` element below to the `<td>` cells in the Confirmation Documents and Notes columns
   * Add the `text-center` class to the last `<tr>` element in the file
   * Inside the last `<tr>` element, there are two `<td>` cells with 0 as the value. Add `id="pop_planned"` to the first `<td>` and `id="pop_actual"` to the second one
<br>
5. `/resources/views/tables/services.blade.php`
   * Replace all the `<td>` cells at the top of the document with the ones listed below in the *Table Head Classes - Services* section
   * Add the `align-middle` class to all `<td>` elements in the Points, Planned, Achieved, Confirmation Documents, and Notes columns
   * Copy the `<textarea>` element below to the `<td>` cells in the Confirmation Documents and Notes columns
   * Copy the checkbox element below to the `<td>` cells in the Planned and Achieved columns. In the `data-value` attribute put the corresponding value for the row (i.e. for the first row, the grocery store option is worth 10 points, so you would put `data-value="10"`). Look at the general equity table if you're confused on how it should look.
*Note: The easiest way to see the correct data-value is to run vagrant and open the project. The values can also be retrieved from the actual excel tool that Southface sent us.*
   * Add the `text-center` class to the last `<tr>` element in the file
   * Inside the last `<tr>` element, there are two `<td>` cells with 0 as the value. Add `id="services_planned"` to the first `<td>` and `id="services_actual"` to the second one
---
#### Table Head Classes
```html
<th class="points">Points</th>
<th class="planned">Planned</th>
<th class="achieved">Achieved</th>
<th class="confirmation">Confirmation Documents</th>
<th class="notes">Notes: DATE</th>
```
#### Table Head Classes - Physical
```html
<th class="text-center align-middle font-weight-bold title" colspan="2">PHYSICAL FORM</th>
<th class="points">Points</th>
<th class="planned">Planned</th>
<th class="achieved">Achieved</th>
<th class="confirmation">Confirmation Documents</th>
<th class="notes">Notes: DATE</th>
```
#### Table Head Classes - Services
```html
<th class="text-center align-middle font-weight-bold title" colspan="2">SERVICES AND EMPLOYMENT</th>
<th class="points">Points</th>
<th class="planned">Planned</th>
<th class="achieved">Achieved</th>
<th class="confirmation">Confirmation Documents</th>
<th class="notes">Notes: DATE</th>
```
#### Textarea Element
```html
<textarea id="" class="form-control form-control-sm" placeholder="Example text..."></textarea>
``` 

#### Checkbox Element
```html
<div class="pretty p-default p-thick p-smooth">
    <input id="" type="checkbox" data-value="" />
    <div class="state p-success-o">
        <label></label>
    </div>
</div>
```
