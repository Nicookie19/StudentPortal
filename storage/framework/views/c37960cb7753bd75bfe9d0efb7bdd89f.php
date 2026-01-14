<?php $__env->startSection('title', 'Support Ticket - Student Portal'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header">
        <h2>Support Ticket</h2>
        <p>Submit your questions, concerns, or requests</p>
    </div>

    <?php if(session('success')): ?>
        <div class="card" style="background-color: rgba(34, 197, 94, 0.1); border-color: #22c55e; margin-bottom: 20px;">
            <h3 style="color: #22c55e; margin-bottom: 8px;">✅ Ticket Submitted Successfully!</h3>
            <p>Thank you for your submission. Our team will review your ticket and get back to you soon.</p>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">
            <h3>📝 Submit a Support Ticket</h3>
            <span class="card-icon">🎫</span>
        </div>
        <p style="margin: 16px 0; color: rgba(255, 255, 255, 0.7);">Have a question, concern, or request? Fill out the form below and our team will get back to you as soon as possible.</p>
        
        <form action="<?php echo e(url('/support-ticket')); ?>" method="POST" style="margin-top: 20px;">
            <?php echo csrf_field(); ?>
            
            <div class="card-grid" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="Alex Doe" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="alex.doe@student.edu.ph" readonly>
                </div>
            </div>
            
            <div class="card-grid" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">Select a category...</option>
                        <option value="technical">Technical Issue</option>
                        <option value="account">Account & Login</option>
                        <option value="grades">Grades & Records</option>
                        <option value="financial">Financial & Payment</option>
                        <option value="enrollment">Enrollment</option>
                        <option value="suggestion">Suggestion</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="priority">Priority Level</label>
                    <select id="priority" name="priority" class="form-control" required>
                        <option value="low">Low - General Inquiry</option>
                        <option value="medium" selected>Medium - Needs Attention</option>
                        <option value="high">High - Urgent Issue</option>
                        <option value="critical">Critical - Cannot Access Portal</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" class="form-control" placeholder="Brief description of your issue" required>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="6" placeholder="Please provide as much detail as possible about your issue or request..." required></textarea>
            </div>
            
            <div class="btn-group">
                <button type="submit" class="btn-primary">🚀 Submit Ticket</button>
                <button type="reset" class="btn-secondary">🔄 Clear Form</button>
            </div>
        </form>
    </div>

    <div class="card" style="margin-top: 20px;">
        <div class="card-header">
            <h3>📜 Previous Tickets</h3>
        </div>
        <ul>
            <li><strong>Aug 15, 2024</strong> - Cannot access grades - <span class="status-badge status-cleared">Resolved</span></li>
            <li><strong>Jul 20, 2024</strong> - Request for enrollment override - <span class="status-badge status-cleared">Resolved</span></li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/nico/myproject/resources/views/support-ticket.blade.php ENDPATH**/ ?>