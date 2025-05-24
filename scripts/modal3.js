  function openViewBidsModal(lotId) {
    // 7na ghadi n'affichiw modal (static), ila bghiti tsift AJAX lotId, n9dar n3awnk
    document.getElementById('viewBidsModal').classList.remove('hidden');
  }

  function closeViewBidsModal() {
    document.getElementById('viewBidsModal').classList.add('hidden');
  }

