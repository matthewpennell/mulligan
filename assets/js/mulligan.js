// Slice the first character of article content to make the dropcap.
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.post-template')) {
        const first_paragraph = document.querySelector('#post-content p');
        const first_letter = first_paragraph.innerHTML.substring(0, 1);
        const remainder = first_paragraph.innerHTML.substring(1);
        first_paragraph.innerHTML = '<span class="sr-only">' + first_letter + '</span>' + remainder;
        document.querySelector('#post-content-dropcap').innerHTML = first_letter;
    }
});

// Fix the height of the page on shorter posts and wider screens if the image is too tall.
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#post-content')) {
        document.querySelector('#post-content').style.minHeight = document.querySelector('#metadata').offsetHeight + 'px';
    }
});

// Poll the Last.fm feed and grab my latest listened track.
document.addEventListener('DOMContentLoaded', () => {
    fetch('https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=Watchmaker&api_key=eae3e31423356ac400ac5c429a5b855e&format=json&limit=1').then(response => response.json()).then(json => {
        track_info = json.recenttracks.track[0];
        const artist = track_info.artist['#text'];
        const track_name = track_info.name;
        const img = document.createElement('img');
        img.src = track_info.image[3]['#text'];
        img.alt = `${track_name} by ${artist}`;
        const byline = document.createElement('div');
        const em = document.createElement('em');
        em.innerHTML = track_name;
        const span = document.createElement('span');
        span.innerHTML = artist;
        byline.appendChild(em);
        byline.appendChild(span);
        const fragment = document.createDocumentFragment();
        fragment.appendChild(img);
        fragment.appendChild(byline);
        document.querySelector('footer #listening').appendChild(fragment);
    });
});
