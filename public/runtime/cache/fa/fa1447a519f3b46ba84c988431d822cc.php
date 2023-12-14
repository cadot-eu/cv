<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* main.tex.twig */
class __TwigTemplate_30591718afc19e60c16903a37f60cdf2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
% Developer CV
% LaTeX Template
% Version 1.0 (28/1/19)
%
% This template originates from:
% http://www.LaTeXTemplates.com
%
% Authors:
% Jan Vorisek (jan@vorisek.me)
% Based on a template by Jan Küster (info@jankuester.com)
% Modified for LaTeX Templates by Vel (vel@LaTeXTemplates.com)
%
% License:
% The MIT License (see included LICENSE file)
%
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%----------------------------------------------------------------------------------------
%\tPACKAGES AND OTHER DOCUMENT CONFIGURATIONS
%----------------------------------------------------------------------------------------

\\documentclass[9pt]{developercv} % Default font size, values from 8-12pt are recommended

%----------------------------------------------------------------------------------------

\\begin{document}

%----------------------------------------------------------------------------------------
%\tTITLE AND CONTACT INFORMATION
%----------------------------------------------------------------------------------------

\\begin{minipage}[t]{0.45\\textwidth} % 45% of the page width for name
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t% If your name is very short, use just one of the lines below
\t% If your name is very long, reduce the font size or make the minipage wider and reduce the others proportionately
\t\\colorbox{black}{{\\HUGE\\textcolor{white}{\\textbf{\\MakeUppercase{Alyx}}}}} % First name
\t
\t\\colorbox{black}{{\\HUGE\\textcolor{white}{\\textbf{\\MakeUppercase{Vance}}}}} % Last name
\t
\t\\vspace{6pt}
\t
\t{\\huge Web App Architect} % Career or current job title
\\end{minipage}
\\begin{minipage}[t]{0.275\\textwidth} % 27.5% of the page width for the first row of icons
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t% The first parameter is the FontAwesome icon name, the second is the box size and the third is the text
\t% Other icons can be found by referring to fontawesome.pdf (supplied with the template) and using the word after \\fa in the command for the icon you want
\t\\icon{MapMarker}{12}{Black Mesa East}\\\\
\t\\icon{Phone}{12}{+1 123 456 789}\\\\
\t\\icon{At}{12}{\\href{mailto:alyx@vance.me}{alyx@vance.me}}\\\\\t
\\end{minipage}
\\begin{minipage}[t]{0.275\\textwidth} % 27.5% of the page width for the second row of icons
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t% The first parameter is the FontAwesome icon name, the second is the box size and the third is the text
\t% Other icons can be found by referring to fontawesome.pdf (supplied with the template) and using the word after \\fa in the command for the icon you want
\t\\icon{Globe}{12}{\\href{https://alyx.vance.me}{alyx.vance.me}}\\\\
\t\\icon{Github}{12}{\\href{https://github.com/alyxvance}{github.com/alyxvance}}\\\\
\t\\icon{Twitter}{12}{\\href{https://twitter.com/@alyxvance}{@alyxvance}}\\\\
\\end{minipage}

\\vspace{0.5cm}

%----------------------------------------------------------------------------------------
%\tINTRODUCTION, SKILLS AND TECHNOLOGIES
%----------------------------------------------------------------------------------------

\\cvsect{Who Am I?}

\\begin{minipage}[t]{0.4\\textwidth} % 40% of the page width for the introduction text
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t\\lorem \\lorem \\lorem \\lorem \\lorem\\\\ % Dummy text
\\end{minipage}
\\hfill % Whitespace between
\\begin{minipage}[t]{0.5\\textwidth} % 50% of the page for the skills bar chart
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t\\begin{barchart}{5.5}
\t\t\\baritem{JavaScript}{60}
\t\t\\baritem{PHP}{100}
\t\t\\baritem{SASS/LESS}{70}
\t\t\\baritem{Bootstrap}{70}
\t\t\\baritem{Git}{40}
\t\t\\baritem{LaTeX}{60}
\t\\end{barchart}
\\end{minipage}

\\begin{center}
\t\\bubbles{5/Eclipse, 6/git, 4/Office, 3/Inkscape, 3/Blender}
\\end{center}

%----------------------------------------------------------------------------------------
%\tEXPERIENCE
%----------------------------------------------------------------------------------------

\\cvsect{Experience}

\\begin{entrylist}
\t\\entry
\t\t{2017 -- 3/2018}
\t\t{Front-end developer}
\t\t{Big Corporation Name Inc.}
\t\t{\\lorem \\lorem \\lorem\\\\ \\texttt{node.js}\\slashsep\\texttt{Vue.js}\\slashsep\\texttt{Electron}}
\t\\entry
\t\t{2015 -- 2018\\\\\\footnotesize{part time}}
\t\t{Full stack developer}
\t\t{Famous Eshop Inc.}
\t\t{\\lorem\\lorem\\\\ \\texttt{PHP}\\slashsep\\texttt{JS}\\slashsep\\texttt{MariaDB}\\slashsep\\texttt{Linux}}
\t\\entry
\t\t{2013 -- 2014\\\\\\footnotesize{part time}}
\t\t{Junior PHP Developer}
\t\t{example.com}
\t\t{\\lorem\\lorem\\\\ \\texttt{PHP}\\slashsep\\texttt{Laravel}}
\\end{entrylist}

%----------------------------------------------------------------------------------------
%\tEDUCATION
%----------------------------------------------------------------------------------------

\\cvsect{Education}

\\begin{entrylist}
\t\\entry
\t\t{2013 -- 2017}
\t\t{Master's Degree}
\t\t{Another University Name}
\t\t{\\lorem\\lorem\\lorem}
\t\\entry
\t\t{2014}
\t\t{Postgraduate Diploma}
\t\t{A University Name}
\t\t{\\lorem\\lorem}
\t\\entry
\t\t{2007 -- 2013}
\t\t{Bachelor's Degree}
\t\t{A University Name}
\t\t{\\lorem\\lorem}
\\end{entrylist}

%----------------------------------------------------------------------------------------
%\tADDITIONAL INFORMATION
%----------------------------------------------------------------------------------------

\\begin{minipage}[t]{0.3\\textwidth}
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages

\t\\cvsect{Languages}
\t
\t\\textbf{English} - native\\\\
\t\\textbf{German} - proficient\\\\
\t\\textbf{Polish} - rudimentary
\\end{minipage}
\\hfill
\\begin{minipage}[t]{0.3\\textwidth}
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t\\cvsect{Hobbies}
\t
\tI love... \\lorem
\\end{minipage}
\\hfill
\\begin{minipage}[t]{0.3\\textwidth}
\t\\vspace{-\\baselineskip} % Required for vertically aligning minipages
\t
\t\\cvsect{Non profit}
\t
\tI help... \\lorem
\\end{minipage}

%----------------------------------------------------------------------------------------

\\end{document}
";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "main.tex.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "main.tex.twig", "/app/templates/main.tex.twig");
    }
}
