<h1 class="h3 mb-4">Enquiry Details</h1>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Enquiry #<?= $enquiry['id'] ?></span>
        <span class="badge bg-<?= $enquiry['status'] === 'pending' ? 'warning' : ($enquiry['status'] === 'responded' ? 'success' : 'secondary') ?>">
            <?= ucfirst($enquiry['status']) ?>
        </span>
    </div>
    <div class="card-body">
        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="text-muted">Contact Information</h6>
                <p class="mb-1"><strong>Name:</strong> <?= htmlspecialchars($enquiry['name']) ?></p>
                <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($enquiry['email']) ?></p>
                <p class="mb-1"><strong>Phone:</strong> <?= htmlspecialchars($enquiry['phone'] ?? 'N/A') ?></p>
            </div>
            <div class="col-md-6">
                <h6 class="text-muted">Enquiry Details</h6>
                <p class="mb-1"><strong>Subject:</strong> <?= htmlspecialchars($enquiry['subject'] ?? 'General Enquiry') ?></p>
                <p class="mb-1"><strong>Date:</strong> <?= date('d M Y, h:i A', strtotime($enquiry['created_at'])) ?></p>
            </div>
        </div>
        
        <h6 class="text-muted">Message</h6>
        <div class="bg-light p-3 rounded mb-4">
            <?= nl2br(htmlspecialchars($enquiry['message'])) ?>
        </div>

        <form action="/admin/enquiries/<?= $enquiry['id'] ?>/status" method="POST" class="d-inline">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
            <div class="row align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Update Status</label>
                    <select name="status" class="form-select">
                        <option value="pending" <?= $enquiry['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="responded" <?= $enquiry['status'] === 'responded' ? 'selected' : '' ?>>Responded</option>
                        <option value="closed" <?= $enquiry['status'] === 'closed' ? 'selected' : '' ?>>Closed</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="mt-3">
    <a href="/admin/enquiries" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Back to Enquiries</a>
</div>
