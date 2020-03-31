<button id="project-{{ array_search($project, $projects) }}" class="container project-card" type="submit" onclick="this.form.action='/projects/{{ array_search($project, $projects) }}';">
    <div class="row project-title">
        <h3>{{ $project['title'] }}</h3>
    </div>
    <div class="row">
        <p>Site Address: {{ $project['address'] }}</p>
    </div>
    <div class="row">
        <p>Charrette Date: {{ $project['charrette'] }}</p>
    </div>
    <div class="row">
        <p>Kickoff Date: {{ $project['kickoff'] }}</p>
    </div>
</button>
