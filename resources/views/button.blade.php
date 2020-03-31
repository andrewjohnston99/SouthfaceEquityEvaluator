<button id="project-{{ array_search($project, $projects) }}" class="project-card" type="submit" onclick="this.form.action='/projects/{{ array_search($project, $projects) }}';">
    <div class="row project-title">
        <h2>{{ $project['title'] }}</h2>
    </div>
    <div class="row">
        <h3>Kickoff Date: {{ $project['kickoff'] }}</h3>
    </div>
    <div class="row">
        <h3>Charrette Date: {{ $project['charrette'] }}</h3>
    </div>
    <div class="row">
        <h3>Site Address: {{ $project['address'] }}</h3>
    </div>
</button>
