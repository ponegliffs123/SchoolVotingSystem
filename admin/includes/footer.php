<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>All rights reserved</b>
    </div>
    <b><strong>Copyright &copy; Ponegliffss</strong></b>
</footer>

<style>
/* Glassmorphism Footer */
.main-footer {
    position: relative;
    width: calc(100% - 250px); /* Adjusts for Sidebar Width */
    margin-left: 250px; /* Pushes Footer Right to Align with Content */
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 15px;
    text-align: center;
    color: white;
    font-size: 13px;
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    transition: 0.3s ease-in-out;
}

/* Sticky Footer if Content is Small */
html, body {
    height: 100%;
    display: flex;
    flex-direction: column;
}
.content-wrapper {
    flex: 1;
}

/* Mobile Adjustments */
@media (max-width: 992px) {
    .main-footer {
        width: calc(100% - 200px);
        margin-left: 200px;
    }
}
@media (max-width: 768px) {
    .main-footer {
        width: calc(100% - 70px); /* Adjust for Collapsed Sidebar */
        margin-left: 70px;
    }
}
</style>
