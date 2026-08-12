{{-- Quote Request Modal Component --}}

<!-- Toast Container -->
<div id="quoteToast" class="quote-toast" style="display:none;">
    <div class="quote-toast-inner">
        <i class="fas fa-info-circle" id="quoteToastIcon"></i>
        <span id="quoteToastMsg">Item added to quote request</span>
    </div>
</div>

<!-- Quote Modal Overlay & Dialog -->
<div id="quoteModalOverlay" class="quote-modal-overlay" onclick="if(event.target === this) closeQuoteModal();" style="display:none;">
    <div class="quote-modal-card">
        <div class="quote-modal-header">
            <div class="quote-modal-title">
                <i class="fas fa-file-invoice-dollar" style="color:var(--brass, #AD8036);"></i>
                <h3>Request Official Quote</h3>
            </div>
            <button type="button" class="quote-modal-close" onclick="closeQuoteModal()">&times;</button>
        </div>

        <div class="quote-modal-body">
            <!-- Selected Items List -->
            <div class="quote-items-section">
                <h4 class="quote-section-title"><i class="fas fa-boxes"></i> Selected Products (<span id="modalItemsCount">0</span>)</h4>
                <div id="quoteModalItemsList" class="quote-items-list">
                    <!-- Dynamic rendering via JS -->
                </div>
            </div>

            <!-- Customer Request Form -->
            <form id="quoteModalForm" onsubmit="submitQuoteForm(event)" class="quote-form">
                @csrf
                <h4 class="quote-section-title"><i class="fas fa-user-edit"></i> Customer Information</h4>
                
                <div class="quote-form-grid">
                    <div class="quote-form-group">
                        <label>Full Name <span class="req">*</span></label>
                        <input type="text" name="name" id="q_name" placeholder="Enter your full name" required>
                    </div>

                    <div class="quote-form-group">
                        <label>Email Address <span class="req">*</span></label>
                        <input type="email" name="email" id="q_email" placeholder="name@company.com" required>
                    </div>

                    <div class="quote-form-group">
                        <label>Phone / Mobile <span class="req">*</span></label>
                        <input type="tel" name="phone" id="q_phone" placeholder="+91 98765 43210" required>
                    </div>

                    <div class="quote-form-group">
                        <label>Company Name</label>
                        <input type="text" name="company_name" id="q_company" placeholder="e.g. Petrochem Ltd">
                    </div>
                </div>

                <div class="quote-form-group full-width">
                    <label>Message / Specifications</label>
                    <textarea name="message" id="q_message" rows="3" placeholder="Specify any target pricing, delivery timelines, or custom specifications..."></textarea>
                </div>

                <div id="quoteFormError" class="quote-form-error" style="display:none;"></div>

                <div class="quote-modal-footer">
                    <button type="button" class="btn-cancel-quote" onclick="closeQuoteModal()">Cancel</button>
                    <button type="submit" id="btnSubmitQuote" class="btn-submit-quote">
                        <i class="fas fa-paper-plane"></i> Submit Quote Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Modal Overlay */
.quote-modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    z-index: 99999;
    background: rgba(10, 20, 15, 0.75);
    backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
    animation: fadeInModal 0.3s ease;
}

@keyframes fadeInModal {
    from { opacity: 0; }
    to { opacity: 1; }
}

.quote-modal-card {
    background: #FFFFFF;
    border-radius: 8px;
    max-width: 680px;
    width: 100%;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 24px 60px rgba(0, 0, 0, 0.3);
    border: 1px solid #E3DFCF;
    overflow: hidden;
    animation: slideUpModal 0.3s cubic-bezier(0.16, 0.84, 0.44, 1);
}

@keyframes slideUpModal {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.quote-modal-header {
    background: #0E3D2A;
    color: #FFFFFF;
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.quote-modal-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.quote-modal-title h3 {
    margin: 0;
    font-family: 'Fraunces', serif;
    font-size: 20px;
    font-weight: 500;
    color: #FFFFFF;
}

.quote-modal-close {
    background: transparent;
    border: none;
    color: rgba(255, 255, 255, 0.8);
    font-size: 26px;
    cursor: pointer;
    line-height: 1;
    transition: color 0.2s;
}

.quote-modal-close:hover {
    color: #FFFFFF;
}

.quote-modal-body {
    padding: 24px;
    overflow-y: auto;
}

.quote-section-title {
    font-size: 14px;
    font-weight: 700;
    color: #0E3D2A;
    margin: 0 0 12px 0;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 2px solid #F6F3EB;
    padding-bottom: 6px;
}

.quote-items-section {
    margin-bottom: 24px;
}

.quote-items-list {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #E3DFCF;
    border-radius: 6px;
    background: #FAF8F5;
}

.quote-item-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 14px;
    border-bottom: 1px solid #E3DFCF;
    gap: 12px;
}

.quote-item-row:last-child {
    border-bottom: none;
}

.quote-item-info {
    flex: 1;
}

.quote-item-name {
    font-weight: 600;
    font-size: 14px;
    color: #14150F;
    margin: 0 0 2px 0;
}

.quote-item-meta {
    font-size: 11.5px;
    color: #83887B;
    display: flex;
    gap: 12px;
}

.quote-item-qty {
    display: flex;
    align-items: center;
    gap: 6px;
}

.quote-qty-btn {
    width: 26px;
    height: 26px;
    border-radius: 4px;
    border: 1px solid #E3DFCF;
    background: #FFFFFF;
    color: #14150F;
    font-weight: bold;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.quote-qty-btn:hover {
    background: #0E3D2A;
    color: #FFFFFF;
    border-color: #0E3D2A;
}

.quote-qty-num {
    font-size: 13px;
    font-weight: 600;
    width: 24px;
    text-align: center;
}

.quote-item-remove {
    background: none;
    border: none;
    color: #B4552C;
    cursor: pointer;
    font-size: 14px;
    padding: 4px;
}

.quote-item-remove:hover {
    color: #800000;
}

.quote-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}

@media (max-width: 580px) {
    .quote-form-grid { grid-template-columns: 1fr; }
}

.quote-form-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    margin-bottom: 12px;
}

.quote-form-group.full-width {
    grid-column: 1 / -1;
}

.quote-form-group label {
    font-size: 12.5px;
    font-weight: 600;
    color: #42463C;
}

.quote-form-group label .req {
    color: #B4552C;
}

.quote-form-group input,
.quote-form-group textarea {
    width: 100%;
    padding: 10px 12px;
    font-size: 13.5px;
    border: 1px solid #E3DFCF;
    border-radius: 4px;
    background: #FFFFFF;
    color: #14150F;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.quote-form-group input:focus,
.quote-form-group textarea:focus {
    outline: none;
    border-color: #0E3D2A;
    box-shadow: 0 0 0 3px rgba(14, 61, 42, 0.1);
}

.quote-form-error {
    background: #FDF2F2;
    color: #9B1C1C;
    padding: 10px;
    border-radius: 4px;
    font-size: 13px;
    margin-bottom: 12px;
    border: 1px solid #F8B4B4;
}

.quote-modal-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 16px;
    padding-top: 14px;
    border-top: 1px solid #E3DFCF;
}

.btn-cancel-quote {
    background: #F6F3EB;
    color: #42463C;
    border: 1px solid #E3DFCF;
    padding: 10px 18px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 13.5px;
    cursor: pointer;
}

.btn-cancel-quote:hover {
    background: #EEE9DB;
}

.btn-submit-quote {
    background: #0E3D2A;
    color: #FFFFFF;
    border: none;
    padding: 10px 24px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 13.5px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: background 0.2s;
}

.btn-submit-quote:hover {
    background: #1D6146;
}

/* Toast styling */
.quote-toast {
    position: fixed;
    top: 95px;
    right: 24px;
    z-index: 999999;
    animation: toastSlideIn 0.35s cubic-bezier(0.16, 0.84, 0.44, 1);
}

@keyframes toastSlideIn {
    from { transform: translateX(50px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

.quote-toast-inner {
    background: #0E3D2A;
    color: #FFFFFF;
    padding: 14px 22px;
    border-radius: 8px;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    font-weight: 600;
    border: 1.5px solid #AD8036;
}

.quote-toast-inner i {
    font-size: 18px;
    color: #E0B15E;
}
</style>

<script>
// Global Quote State & AJAX Handler
let currentQuoteCount = 0;

let toastTimer = null;
function showQuoteToast(msg, iconClass = 'fa-check-circle') {
    const toast = document.getElementById('quoteToast');
    const toastMsg = document.getElementById('quoteToastMsg');
    const toastIcon = document.getElementById('quoteToastIcon');
    
    if (toast && toastMsg && toastIcon) {
        if (toastTimer) clearTimeout(toastTimer);
        toastMsg.innerText = msg;
        toastIcon.className = 'fas ' + iconClass;
        toast.style.display = 'block';
        toastTimer = setTimeout(() => {
            toast.style.display = 'none';
        }, 4000);
    }
}

function updateHeaderBadge(count) {
    currentQuoteCount = count;
    const badge = document.getElementById('headerQuoteBadge');
    if (badge) {
        badge.innerText = count;
    }
}

function fetchQuoteState() {
    fetch("{{ route('quote.getCart') }}")
        .then(res => res.json())
        .then(data => {
            if (data.status) {
                updateHeaderBadge(data.count);
            }
        })
        .catch(err => console.error(err));
}

function addToQuote(productId, slug = null, quantity = 1) {
    const csrfToken = '{{ csrf_token() }}';
    fetch("{{ route('quote.add') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId, slug: slug, quantity: quantity })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            updateHeaderBadge(data.count);
            showQuoteToast('Product successfully added to your Quote Request!', 'fa-check-circle');
        } else {
            showQuoteToast(data.message || 'Unable to add product to quote request.', 'fa-exclamation-circle');
        }
    })
    .catch(err => {
        console.error(err);
        showQuoteToast('Failed to add product. Please try again.', 'fa-exclamation-triangle');
    });
}

function handleHeaderQuoteClick(e) {
    if (e) e.preventDefault();
    if (currentQuoteCount > 0) {
        openQuoteModal();
    } else {
        showQuoteToast('Your quote list is empty! Please add at least one product to request a quote.', 'fa-exclamation-circle');
    }
}

function openQuoteModal() {
    renderQuoteModalItems();
    document.getElementById('quoteModalOverlay').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeQuoteModal() {
    document.getElementById('quoteModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
}

function renderQuoteModalItems() {
    const itemsListContainer = document.getElementById('quoteModalItemsList');
    const modalItemsCount = document.getElementById('modalItemsCount');
    
    fetch("{{ route('quote.getCart') }}")
        .then(res => res.json())
        .then(data => {
            if (data.status) {
                updateHeaderBadge(data.count);
                if (modalItemsCount) modalItemsCount.innerText = data.count;
                
                if (!data.items || data.items.length === 0) {
                    itemsListContainer.innerHTML = '<div style="padding: 20px; text-align: center; color: #83887B; font-size: 13px;">No products selected.</div>';
                    closeQuoteModal();
                    return;
                }

                let html = '';
                data.items.forEach(item => {
                    html += `
                        <div class="quote-item-row">
                            <div class="quote-item-info">
                                <p class="quote-item-name">${item.title}</p>
                                <div class="quote-item-meta">
                                    ${item.part_number ? `<span>Part No: <strong>${item.part_number}</strong></span>` : ''}
                                    ${item.model_number ? `<span>Model: <strong>${item.model_number}</strong></span>` : ''}
                                </div>
                            </div>
                            <div class="quote-item-qty">
                                <button type="button" class="quote-qty-btn" onclick="updateQuoteItemQty(${item.id}, ${item.quantity - 1})">-</button>
                                <span class="quote-qty-num">${item.quantity}</span>
                                <button type="button" class="quote-qty-btn" onclick="updateQuoteItemQty(${item.id}, ${item.quantity + 1})">+</button>
                            </div>
                            <button type="button" class="quote-item-remove" onclick="removeQuoteItem(${item.id})" title="Remove"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    `;
                });
                itemsListContainer.innerHTML = html;
            }
        });
}

function updateQuoteItemQty(productId, newQty) {
    const csrfToken = '{{ csrf_token() }}';
    fetch("{{ route('quote.update') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ product_id: productId, quantity: newQty })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            updateHeaderBadge(data.count);
            if (data.count === 0) {
                closeQuoteModal();
            } else {
                renderQuoteModalItems();
            }
        }
    });
}

function removeQuoteItem(productId) {
    fetch(`/quote/remove/${productId}`)
        .then(res => res.json())
        .then(data => {
            if (data.status) {
                updateHeaderBadge(data.count);
                if (data.count === 0) {
                    closeQuoteModal();
                } else {
                    renderQuoteModalItems();
                }
            }
        });
}

function submitQuoteForm(e) {
    e.preventDefault();
    const btnSubmit = document.getElementById('btnSubmitQuote');
    const errDiv = document.getElementById('quoteFormError');
    errDiv.style.display = 'none';

    btnSubmit.disabled = true;
    btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';

    const formData = new FormData(document.getElementById('quoteModalForm'));

    fetch("{{ route('quote.submit') }}", {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        btnSubmit.disabled = false;
        btnSubmit.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Quote Request';

        if (data.status) {
            closeQuoteModal();
            updateHeaderBadge(0);
            document.getElementById('quoteModalForm').reset();
            showQuoteToast('Quote Request Submitted Successfully!', 'fa-check-circle');

            // Launch WhatsApp in a NEW TAB to admin number (+447879175585)
            if (data.whatsapp_url) {
                const waLink = document.createElement('a');
                waLink.href = data.whatsapp_url;
                waLink.target = '_blank';
                waLink.rel = 'noopener noreferrer';
                document.body.appendChild(waLink);
                waLink.click();
                document.body.removeChild(waLink);
            }
        } else {
            errDiv.innerText = data.message || 'Validation failed. Please check form inputs.';
            errDiv.style.display = 'block';
        }
    })
    .catch(err => {
        console.error(err);
        btnSubmit.disabled = false;
        btnSubmit.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Quote Request';
        errDiv.innerText = 'Server error occurred. Please try again.';
        errDiv.style.display = 'block';
    });
}

document.addEventListener('DOMContentLoaded', fetchQuoteState);
</script>
