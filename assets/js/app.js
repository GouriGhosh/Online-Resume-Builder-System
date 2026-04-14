function addGroup(containerId, html) {
    const box = document.getElementById(containerId);
    const wrapper = document.createElement('div');
    wrapper.className = 'border rounded p-3 mb-3 bg-light';
    wrapper.innerHTML = html;
    box.appendChild(wrapper);
}
