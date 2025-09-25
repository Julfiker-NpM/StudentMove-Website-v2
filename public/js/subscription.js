function selectPackage(plan, name, price) {
  document.querySelectorAll('.package-card').forEach(card => {
    card.classList.remove('selected');
  });

  // Use closest from the clicked element
  if (window.event && window.event.target) {
    const clickedCard = window.event.target.closest('.package-card');
    if (clickedCard) {
      clickedCard.classList.add('selected');
    }
  }

  document.getElementById('selected-plan-name').textContent = name;
  document.getElementById('selected-plan-price').textContent = price;
  document.getElementById('payment-section').classList.add('show');
  document.getElementById('payment-section').scrollIntoView({ behavior: 'smooth' });
}

function showTab(tab) {
  document.getElementById('tab-card').classList.remove('active');
  document.getElementById('tab-mobile').classList.remove('active');
  document.getElementById('form-card').style.display = 'none';
  document.getElementById('form-mobile').style.display = 'none';
  if (tab === 'card') {
    document.getElementById('tab-card').classList.add('active');
    document.getElementById('form-card').style.display = 'block';
  } else {
    document.getElementById('tab-mobile').classList.add('active');
    document.getElementById('form-mobile').style.display = 'block';
  }
}

// Prevent actual form submission (demo only)
window.addEventListener('DOMContentLoaded', () => {
  const formCard = document.getElementById('form-card');
  const formMobile = document.getElementById('form-mobile');
  if (formCard) formCard.onsubmit = e => { e.preventDefault(); alert('Payment processing (demo only).'); };
  if (formMobile) formMobile.onsubmit = e => { e.preventDefault(); alert('Payment processing (demo only).'); };
});


