/*
title: JIRA - Create Form Template API
template: page
*/

Code snippet for a REST API to create an Issue from a Template.
Requires:
- ScriptRunner plugin for REST Script
- Issue Template Plugin for defining template issue and template scope (what's reused)

Code:


     import com.onresolve.scriptrunner.runner.rest.common.CustomEndpointDelegate
     import groovy.transform.BaseScript
     
     import javax.ws.rs.core.MediaType
     import javax.ws.rs.core.MultivaluedMap
     import javax.ws.rs.core.Response
     import javax.servlet.http.HttpServletRequest
     
     import com.atlassian.jira.component.ComponentAccessor
     import com.atlassian.jira.project.ProjectManager
     
     /**
      * REST API: GET: https://host/jira/rest/scriptrunner/latest/custom/createFromTemplate?project=${project.key}&issueType=${issueTypeId}&templateId=${IssueTemplateId}
      **/
     @BaseScript CustomEndpointDelegate delegate
     createFromTemplate() { MultivaluedMap queryParams, String body, HttpServletRequest request  ->
           
         def issueService = ComponentAccessor.issueService
         def projectManager = ComponentAccessor.projectManager
         def reporterBot = ComponentAccessor.userManager.getUserByName("admin") // Set your default user
         def authContext = ComponentAccessor.getJiraAuthenticationContext()
     	if (!authContext.isLoggedInUser()) {
             authContext.setLoggedInUser(reporterBot);
         }
        
         def issueInputParameters = issueService.newIssueInputParameters()
         def project = projectManager.getProjectObjByKey(queryParams.getFirst("project"))
         
         issueInputParameters.with {
             projectId = project.id
             summary = "Issue from Template"
             issueTypeId = queryParams.getFirst("issueType")
             reporterId = reporterBot.key
         }
         issueInputParameters.addCustomFieldValue("customfield_${template Custom Field}", queryParams.getFirst("templateId"))
         def validationResult = issueService.validateCreate(reporterBot, issueInputParameters)
         if (validationResult.errorCollection.hasAnyErrors()) {
             log.error("Impossible to create issue in project ${project.key} on behalf of ${reporterBot.key} (${reporterBot.displayName}): ${validationResult.errorCollection.errorMessages}")
         }
         assert !validationResult.errorCollection.hasAnyErrors()
     
         def issueResult = issueService.create(reporterBot, validationResult)
         log.warn("Created ${issueResult.issue.key} in project ${project.key} on behalf of ${reporterBot.key} (${reporterBot.displayName})")
         //return Response.ok("Issue: " + issueResult.key).build()
         return Response.created(new URI("/browse/${issueResult.issue.key}")).build();
     }


